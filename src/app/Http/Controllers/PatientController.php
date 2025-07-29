<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PatientRequest;
use Spatie\Permission\Models\Role;

class PatientController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('therapist')) {
            $patients = Patient::where('therapist_id', $user->id)->latest()->paginate(5);
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
        $user = auth()->user();
        if (auth()->user()->hasRole('root')) {
            // Asignar terapeuta elegido por el root
            $data['therapist_id'] = $request->input('therapist_id');
        }

        Patient::create($data);
        return redirect()->route('patients.index');
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
