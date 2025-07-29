<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use App\Traits\DebugHelper;
use App\Traits\ToastTrigger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use DebugHelper, ToastTrigger;

    public function index(Request $request)
    {
        $perPage = config('app.pagination_count', 5);
        /* $data = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'patient');
        })
        ->orWhereHas('roles', function ($query) {
            $query->where('name', '!=', 'patient');
        })->paginate($perPage); */
        $data = User::latest()->paginate($perPage);

        return view('users.index', compact('data'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:password_confirmation',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'Usuario Creado con Exito');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => "required|email|unique:users,email,$id",
            'roles' => 'required',
            'therapist_id' => 'nullable|exists:users,id'
        ]);

        $input = $request->all();
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));
       /*  if ($user->hasRole('patient')) {
            Patient::firstOrCreate(
                ['user_id' => $user->id], // Verifica por user_id, que debería ser único
                [ */
        if ($user->hasRole('patient') && !$user->patient) {
            $patient = Patient::create([
                'user_id' => $user->id,
                'codigo' => fake()->unique()->regexify('[A-Z]{3}[0-9]{3}'),
                'apellidos' => explode(' ', $user->name)[1] ?? 'Apellido',
                'nombres' => explode(' ', $user->name)[0] ?? 'Nombre',
                'dni' => fake()->unique()->numerify('########'),
                'nacimiento' => fake()->date(),
                'sexo' => fake()->randomElement(['M', 'F']),
                'telefono' => fake()->phoneNumber(),
                'email' => $user->email,
                'direccion' => 'Sin asignar',
                'observaciones' => 'Registrado por admin',
            ]);
        }
        if ($user->hasRole('patient')) {
            $therapistIds = $request->input('therapist_ids', []);

            // Obtener solo terapeutas válidos
            $validTherapists = User::role('therapist')
                ->whereIn('id', $therapistIds)
                ->pluck('id')
                ->toArray();

            // El paciente puede tener varios terapeutas → actualizamos todas las relaciones
            $user->therapists()->sync($validTherapists);
        }
        $this->infoToast('Usuario Actualizado');
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        $this->successToast('Usuario Eliminado con Exito');
        return redirect()->route('users.index');
    }
}
