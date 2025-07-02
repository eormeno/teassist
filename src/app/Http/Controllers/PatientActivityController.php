<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Activity;
use App\Models\PatientActivity;
use App\Http\Requests\StorePatientActivityRequest;
use App\Http\Requests\UpdatePatientActivityRequest;
use Carbon\Carbon;
use App\Traits\DebugHelper;

class PatientActivityController extends Controller
{
    use DebugHelper;

    public function index()
    {
        $patient_id = request()->get('patient_id');
        $therapistId = auth()->user()->therapist->id;

        // Obtener pacientes asignados al terapeuta
        $patients = Patient::where('therapist_id', $therapistId)->get();

        // Si no se seleccionó ningún paciente, mostrar solo el dropdown sin error
        if (!$patient_id) {
            return view('patient-activities.index', compact('patients', 'patient_id'));
        }

        // Validar que el paciente consultado sea del terapeuta
        if (!Patient::where('id', $patient_id)->where('therapist_id', $therapistId)->exists()) {
            abort(403, 'No tenés permiso para ver este paciente.');
        }

        $patientActivities = PatientActivity::where('patient_id', $patient_id)
            ->orderByDesc('activity_date')
            ->paginate(5);

        return view('patient-activities.index', compact('patientActivities', 'patients', 'patient_id'));
    }


    public function create()
    {
        $patient_id = request()->get('patient_id');
        $therapistId = auth()->user()->therapist->id;

        // Validar que el paciente sea del terapeuta
        $patient = Patient::where('id', $patient_id)
            ->where('therapist_id', $therapistId)
            ->firstOrFail();

        $patient_full_name = $patient->apellidos . ', ' . $patient->nombres;
        $activity_date = Carbon::now();
        $activities = Activity::all();

        return view('patient-activities.create', compact('activities', 'patient_id', 'patient_full_name', 'activity_date'));
    }

    public function store(StorePatientActivityRequest $request)
    {
        $user_id = auth()->user()->id;
        $therapistId = auth()->user()->therapist->id;
        $patient_id = request()->get('patient_id');

        // Validar que el paciente sea del terapeuta
        Patient::where('id', $patient_id)
            ->where('therapist_id', $therapistId)
            ->firstOrFail();

        $validated = $request->validated();
        $validated['user_id'] = $user_id;
        $validated['patient_id'] = $patient_id;

        // Aquí le asigno la fecha y hora actual
        $validated['activity_date'] = Carbon::now();

        PatientActivity::create($validated);

        return redirect()->route('patient-activities.index', ['patient_id' => $patient_id]);
    }

    public function show(PatientActivity $patientActivity)
    {
        return view('patient-activities.show', compact('patientActivity'));
    }

    public function edit(PatientActivity $patientActivity)
    {
        // Validar que el paciente de la actividad sea del terapeuta
        $therapistId = auth()->user()->therapist->id;
        if ($patientActivity->patient->therapist_id !== $therapistId) {
            abort(403, 'No tenés permiso para editar esta actividad.');
        }

        $patient = $patientActivity->patient;
        $patient_full_name = $patient->apellidos . ', ' . $patient->nombres;
        $activities = Activity::all();

        return view('patient-activities.edit', compact('patientActivity', 'activities', 'patient_full_name'));
    }

    public function update(UpdatePatientActivityRequest $request, PatientActivity $patientActivity)
    {
        // Validar que el paciente de la actividad sea del terapeuta
        $therapistId = auth()->user()->therapist->id;
        if ($patientActivity->patient->therapist_id !== $therapistId) {
            abort(403, 'No tenés permiso para modificar esta actividad.');
        }

        $patient_id = $patientActivity->patient_id;
        $validated = $request->validated();
        $patientActivity->update($validated);

        return redirect()->route('patient-activities.index', ['patient_id' => $patient_id]);
    }

    public function destroy(PatientActivity $patientActivity)
    {
        // Validar que el paciente de la actividad sea del terapeuta
        $therapistId = auth()->user()->therapist->id;
        if ($patientActivity->patient->therapist_id !== $therapistId) {
            abort(403, 'No tenés permiso para eliminar esta actividad.');
        }

        $patientActivity->delete();
        return redirect()->route('patient-activities.index', ['patient_id' => $patientActivity->patient_id]);
    }

    public function myActivities()
    {
        $user = auth()->user();

        // Verificamos que sea paciente y tenga asignado un registro en la tabla `patients`
        if (!$user->patient) {
            abort(403, 'No tenés permiso para ver estas actividades.');
        }

        $patientId = $user->patient->id;

        $activities = PatientActivity::with('activity')
            ->where('patient_id', $patientId)
            ->orderByDesc('activity_date')
            ->get();

        return view('patients.activities', compact('activities'));
    }


}
