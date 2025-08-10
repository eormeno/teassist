<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PatientRequest;
use Spatie\Permission\Models\Role;

class PatientController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('therapist')) {
            $therapistId = $user->id;
            $patients = Patient::where('therapist_id', $therapistId)->latest()->paginate(5);
        } else {
            $patients = Patient::latest()->paginate(5);
        }

        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        $therapists = [];

        if (auth()->user()->hasRole('root')) {
            $therapists = \App\Models\User::role('therapist')->get();
        }

        return view('patients.create', compact('therapists'));
    }

    public function store(PatientRequest $request)
    {
        $data = $request->validated();
        $authUser = auth()->user();
    
        // Determinar therapist_id
        if ($authUser->hasRole('root')) {
            $data['therapist_id'] = $request->input('therapist_id') ?: null;
        } elseif ($authUser->hasRole('therapist')) {
            $data['therapist_id'] = $authUser->id;
        } else {
            $data['therapist_id'] = null;
        }
    
        DB::beginTransaction();
        try {
            // 1) Si existe un usuario con ese email lo reutilizamos,
            //    si no existe lo creamos.
            $user = User::where('email', $data['email'])->first();
        
            if ($user) {
                // Si el user ya está vinculado a otro paciente -> error
                $existingPatient = Patient::where('user_id', $user->id)->first();
                if ($existingPatient) {
                    return redirect()->back()
                        ->withInput()
                        ->withErrors(['email' => 'El email indicado ya está asociado a otro paciente.']);
                }
            
                // Asegurar que tenga el rol 'patient'
                if (! $user->hasRole('patient')) {
                    $user->assignRole('patient');
                }
            } else {
                // Crear usuario nuevo para el paciente
                $password = Str::random(10); // contraseña aleatoria (podés notificarla luego)
                $user = User::create([
                    'name' => trim(($data['nombres'] ?? '') . ' ' . ($data['apellidos'] ?? '')),
                    'email' => $data['email'],
                    'password' => Hash::make($password),
                ]);
                $user->assignRole('patient');
            
                // (Opcional) acá podrías enviar un email con la contraseña o instrucciones
            }
        
            // 2) Crear el paciente y vincular user_id
            $patient = new Patient($data); // asigna campos permitidos por $fillable
            $patient->user_id = $user->id;
            $patient->save();
        
            DB::commit();
        
            return redirect()->route('patients.index')->with('success', 'Paciente creado correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Error al crear paciente: ' . $e->getMessage()]);
        }
    }


    public function show(Patient $patient)
    {
        $user = auth()->user();
        if ($user->hasRole('therapist') && $patient->therapist_id !== $user->id) {
            abort(403, 'No autorizado.');
        }
        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        $user = auth()->user();
        if ($user->hasRole('therapist') && $patient->therapist_id !== $user->id) {
            abort(403, 'No autorizado.');
        }

        $therapists = [];

        if ($user->hasRole('root')) {
            $therapists = User::role('therapist')->get();
        }

        return view('patients.edit', compact('patient', 'therapists'));
    }


    public function update(Request $request, Patient $patient)
    {
        $user = auth()->user();

        if ($user->hasRole('therapist') && $patient->therapist_id !== $user->id) {
            abort(403, 'No autorizado.');
        }

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
            'therapist_id' => 'nullable|exists:users,id',
        ]);

        $data = $request->all();

        if ($user->hasRole('root') && $request->has('therapist_id')) {
            $data['therapist_id'] = $request->input('therapist_id');
        }

        $patient->update($data);


        return redirect()->route('patients.index');
    }


    public function destroy(Patient $patient)
    {
        $user = auth()->user();
        if ($user->hasRole('therapist') && $patient->therapist_id !== $user->id) {
            abort(403, 'No autorizado.');
        }
        $patient->delete();
        return redirect()->route('patients.index');
    }
}
