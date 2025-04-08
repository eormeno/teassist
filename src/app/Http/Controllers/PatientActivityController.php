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
        $patients = Patient::all();
        $patientActivities = PatientActivity::where('patient_id', $patient_id)
        ->orderByDesc('activity_date') // Ordena por fecha, de más reciente a más antigua
        ->paginate(5); // Mantiene la paginación    
        return view('patient-activities.index', compact('patientActivities', 'patients', 'patient_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patient_id = request()->get('patient_id');
        $patient = Patient::find($patient_id);
        $patient_full_name = $patient->apellidos . ', ' . $patient->nombres;
        $activity_date = Carbon::now(); // Guarda la fecha y hora actuales
        $activities = Activity::all();
        return view('patient-activities.create', compact('activities', 'patient_id', 'patient_full_name', 'activity_date'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientActivityRequest $request)
    {
        $user_id = auth()->user()->id;
        $patient_id = request()->get('patient_id');
        $validated = $request->validated();

        $validated['user_id'] = $user_id;
        $validated['patient_id'] = $patient_id;
        $validated['activity_date'] = $request->activity_date; // 📌 Asegura que se asigna manualmente

        PatientActivity::create($validated);

        return redirect()->route('patient-activities.index', ['patient_id' => $patient_id]);
    }





    /**
     * Display the specified resource.
     */
    public function show(PatientActivity $patientActivity)
    {
        return view('patient-activities.show', compact('patientActivity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PatientActivity $patientActivity)
    {
        $patient = $patientActivity->patient;
        $patient_full_name = $patient->apellidos . ', ' . $patient->nombres;
        $activities = Activity::all();
        return view('patient-activities.edit', compact('patientActivity', 'activities', 'patient_full_name'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientActivityRequest $request, PatientActivity $patientActivity)
    {
        $patient_id = $patientActivity->patient_id;
        $validated = $request->validated();
        $patientActivity->update($validated);
        return redirect()->route('patient-activities.index', ['patient_id' => $patient_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PatientActivity $patientActivity)
    {
        $patientActivity->delete();
        return redirect()->route('patient-activities.index', ['patient_id' => $patientActivity->patient_id]);
    }
}
