<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\PatientActivity;

class PatientActivitiesApiController extends Controller
{
    public function getPatientActivities(string $code)
    {
        $patient = Patient::where('codigo', $code)->first();
        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }
        // Paginado configurable
        $perPage = config('app.pagination_count', 5);

        // Actividades ordenadas por fecha reciente, paginadas
        $activities = PatientActivity::where('patient_id', $patient->id)
            ->with('activity')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        $formattedActivities = $this->hidePatientActivitesResponseFields($activities->items());

        $response = [
            'patient' => $patient = $this->hidePatientResponseFields($patient),
            'activities' => $formattedActivities,
            'pagination' => [
                'current_page' => $activities->currentPage(),
                'last_page' => $activities->lastPage(),
                'per_page' => $activities->perPage(),
                'total' => $activities->total(),
        ]];
        return response()->json($response);
    }

    private function hidePatientResponseFields($patient)
    {
        return [
            'nombres' => $patient->nombres,
            'apellidos' => $patient->apellidos,
            'nacimiento' => $patient->nacimiento,
            'sexo' => $patient->sexo,
            'telefono' => $patient->telefono,
        ];
    }

    private function hidePatientActivitesResponseFields($patientActivities)
    {
        return $patientActivities->map(function ($patientActivity) {
            return [
                'activity_id' => $patientActivity->activity->id,
                'activity_name' => $patientActivity->activity->name,
                'activity_description' => $patientActivity->activity->description,
                'activity_thumbnail' => $patientActivity->activity->thumbnail,
                'description' => $patientActivity->description,
                'reasons' => $patientActivity->reasons,
                'goals' => $patientActivity->goals,
                'indicators' => $patientActivity->indicators,
                'performed_ago' => $patientActivity->created_at->diffForHumans(),
            ];
        });
    }
}
