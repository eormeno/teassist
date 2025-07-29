<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Patient;
use App\Traits\DebugHelper;
use App\Traits\ToastTrigger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PatientRequest;
use Illuminate\Support\Facades\Hash;


class PatientController extends Controller
{
    use DebugHelper, ToastTrigger;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $perPage = config('app.pagination_count',5);
        if ($user->hasRole('therapist')) {
            // Obtener los IDs de pacientes asignados al terapeuta desde la tabla intermedia
            $assignedPatientIds = \DB::table('patient_therapist')
                ->where('therapist_id', $user->id)
                ->pluck('patient_id');

            // Obtener los pacientes reales (modelo Patient) asociados a esos usuarios
            $patients = Patient::whereIn('user_id', $assignedPatientIds)->paginate($perPage);
        } else {
            // Para admin u otros roles
            $patients = Patient::paginate($perPage);
        }
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request)
    {
        // Validar y crear el paciente
        $validated = $request->validated();

        // Crear el usuario del paciente con datos comunes
        $user = User::create([
            'name' => $validated['nombres'] . ' ' . $validated['apellidos'],
            'email' => $validated['email'],
            'password' => Hash::make(env('FAKE_USERS_PASSWORD')),
        ]);
        $user->assignRole('patient');

        // Asociar el user_id al paciente
        $validated['user_id'] = $user->id;
        $patient = Patient::create($validated);

        // Asociar paciente con el terapeuta autenticado
        $therapist = Auth::user();
        $therapist->assignedPatients()->attach($user->id);
        $this->successToast('Paciente Creado con Exito');

        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'codigo' => 'required|unique:patients,codigo,' . $patient->id,
            'apellidos' => 'required',
            'nombres' => 'required',
            'dni' => 'required|unique:patients,dni,' . $patient->id,
            'nacimiento' => 'required|date',
            'sexo' => 'required',
            'telefono' => 'required',
            'email' => 'required|email|unique:patients,email,' . $patient->id,
            'direccion' => 'required',
        ]);
        $patient->update($request->all());
        $this->successToast('Paciente Editado con Exito');
        return redirect()->route('patients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);

        // Obtener el User asociado al paciente
        $user = $patient->user;

        if ($user) {
            // Obtener ID del terapeuta logueado
            $therapistId = auth()->id();

            // Eliminar solo la relación con ese terapeuta
            $user->therapists()->detach($therapistId);
        }

        // Opcional: eliminar el usuario también si querés
        // $user->delete();

        // Eliminar el paciente
        //$patient->delete();
        $this->successToast('Paciente Eliminado con Exito');
        return redirect()->route('patients.index');
    }
}
