<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Activity;
use App\Traits\DebugHelper;
use App\Traits\ToastTrigger;
use App\Models\PatientActivity;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePatientActivityRequest;
use App\Http\Requests\UpdatePatientActivityRequest;
use Carbon\Carbon;
class PatientActivityController extends Controller
{
    use DebugHelper, ToastTrigger;
    public function index() {
        $user = Auth::user();
        $perPage = config('app.pagination_count', 5);

        // Obtener IDs de pacientes asignados si el usuario es terapeuta
        if ($user->hasRole('therapist')) {
            $allowedPatientIds = \DB::table('patient_therapist')
                ->where('therapist_id', $user->id)
                ->pluck('patient_id');
        } else {
            // Admin u otros roles ven todos los pacientes
            $allowedPatientIds = Patient::pluck('user_id'); // Asumiendo que 'user_id' es la FK en 'patients'
        }

        $patient_id = request()->get('patient_id');

        $patients = Patient::whereIn('user_id', $allowedPatientIds)->get();

        // Consulta filtrada por paciente si viene el parámetro, si no, mostrar todas las actividades de los pacientes permitidos
        $query = PatientActivity::whereIn('patient_id', $patients->pluck('id'));

        if ($patient_id) {
            $query->where('patient_id', $patient_id);
        }

        $patientActivities = $query
            ->orderBy('created_at', 'desc')
            ->paginate($perPage)
            ->appends(['patient_id' => $patient_id]);

        // Transformar para mostrar "hace X tiempo"
        $patientActivities->getCollection()->transform(function ($activity) {
            $activity->performed_ago = $activity->created_at->diffForHumans();
            return $activity;
        });

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
        $activities = Activity::all();
        return view('patient-activities.create', compact('activities', 'patient_id', 'patient_full_name'));
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
        $this->successToast('Actividad de Usuario Eliminada con Exito');
        return redirect()->route('patient-activities.index', ['patient_id' => $patientActivity->patient_id]);
    }

    public function markAsCompleted($id)
    {
        $activity = PatientActivity::findOrFail($id);

        // Solo el paciente asignado puede marcar su actividad
        $patient = auth()->user()->patient;
        if ($activity->patient_id !== $patient->id) {
            abort(403, 'No autorizado');
        }

        $activity->completed_at = Carbon::today(); // Solo fecha
        $activity->save();

        return back()->with('success', '¡Actividad marcada como completada!');
    }

}

