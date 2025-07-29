<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Activity;
use App\Models\PatientActivity;
use App\Http\Requests\StorePatientActivityRequest;
use App\Http\Requests\UpdatePatientActivityRequest;

class PatientActivityController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $patient_id = request()->get('patient_id');
        $patients = [];

        if ($user->hasRole('therapist')) {
            // Mostrar solo pacientes del terapeuta para filtro
            $patients = $user->therapistPatients()->get();

            // Si pidieron un paciente que no es del terapeuta, abortar
            if ($patient_id && !$patients->contains('id', $patient_id)) {
                abort(403, 'No autorizado.');
            }

            $patientActivities = PatientActivity::where('patient_id', $patient_id)->paginate(5);

        } elseif ($user->hasRole('paciente')) {
            // Paciente sólo ve sus propias actividades
            $patient = Patient::where('codigo', $user->email)->first(); 
            // Nota: este método depende de que el email usuario sea igual al código paciente (deberás ajustar según tu lógica)
            if (!$patient) {
                abort(403, 'No autorizado.');
            }
            $patientActivities = PatientActivity::where('patient_id', $patient->id)->paginate(5);
            $patients = collect([$patient]);
            $patient_id = $patient->id;

        } else {
            // Otros roles ven todo normalmente
            $patients = Patient::all();
            $patientActivities = PatientActivity::where('patient_id', $patient_id)->paginate(5);
        }

        return view('patient-activities.index', compact('patientActivities', 'patients', 'patient_id'));
    }

    public function create()
    {
        $user = auth()->user();
        $patient_id = request()->get('patient_id');

        // Verificación para terapeutas
        if ($user->hasRole('therapist')) {
            // Solo permite asignar a pacientes propios
            if (!$user->therapistPatients->pluck('id')->contains($patient_id)) {
                abort(403, 'No autorizado.');
            }
        }

        $patient = Patient::find($patient_id);
        $patient_full_name = $patient->apellidos . ', ' . $patient->nombres;
        $activities = Activity::all();
        return view('patient-activities.create', compact('activities', 'patient_id', 'patient_full_name'));
    }

    public function store(StorePatientActivityRequest $request)
    {
        $user = auth()->user();
        $patient_id = request()->get('patient_id');
        $validated = $request->validated();

        // Si es terapeuta, verificar que el paciente sea suyo
        if ($user->hasRole('therapist')) {
            if (!$user->therapistPatients->pluck('id')->contains($patient_id)) {
                abort(403, 'No autorizado.');
            }
        }

        $validated['user_id'] = $user->id;
        $validated['patient_id'] = $patient_id;
        PatientActivity::create($validated);
        return redirect()->route('patient-activities.index', ['patient_id' => $patient_id]);
    }

    public function show(PatientActivity $patientActivity)
    {
        $user = auth()->user();
        // Si es terapeuta, solo puede ver actividades de sus pacientes
        if ($user->hasRole('therapist')) {
            if ($patientActivity->patient->therapist_id !== $user->id) {
                abort(403, 'No autorizado.');
            }
        }
        // Paciente solo ve sus actividades
        if ($user->hasRole('paciente')) {
            $patient = Patient::where('codigo', $user->email)->first();
            if (!$patient || $patient->id !== $patientActivity->patient_id) {
                abort(403, 'No autorizado.');
            }
        }
        return view('patient-activities.show', compact('patientActivity'));
    }

    public function edit(PatientActivity $patientActivity)
    {
        $user = auth()->user();

        if ($user->hasRole('therapist')) {
            if ($patientActivity->patient->therapist_id !== $user->id) {
                abort(403, 'No autorizado.');
            }
        }

        $patient = $patientActivity->patient;
        $patient_full_name = $patient->apellidos . ', ' . $patient->nombres;
        $activities = Activity::all();
        return view('patient-activities.edit', compact('patientActivity', 'activities', 'patient_full_name'));
    }

    public function update(UpdatePatientActivityRequest $request, PatientActivity $patientActivity)
    {
        $user = auth()->user();

        if ($user->hasRole('therapist')) {
            if ($patientActivity->patient->therapist_id !== $user->id) {
                abort(403, 'No autorizado.');
            }
        }

        $validated = $request->validated();
        $patientActivity->update($validated);

        return redirect()->route('patient-activities.index', ['patient_id' => $patientActivity->patient_id]);
    }

    public function destroy(PatientActivity $patientActivity)
    {
        $user = auth()->user();

        if ($user->hasRole('therapist')) {
            if ($patientActivity->patient->therapist_id !== $user->id) {
                abort(403, 'No autorizado.');
            }
        }

        $patientActivity->delete();

        return redirect()->route('patient-activities.index', ['patient_id' => $patientActivity->patient_id]);
    }
}
