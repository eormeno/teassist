<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Requests\PatientRequest;
use Illuminate\Support\Facades\Gate;
use App\Models\PatientActivity;
use Illuminate\Support\Facades\Auth;




class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        // Verifica si tiene permiso para ver pacientes
        if (!$user->can('view-patients')) {
            abort(403);
        }

        // Si es terapeuta, filtra solo sus pacientes
        if ($user->hasRole('therapist') && $user->therapist) {
            $patients = $user->therapist->patients()->paginate(5);
        } else {
            // Otros roles con permiso ven todos
            $patients = Patient::paginate(5);
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
    public function show(Patient $patient)
    {
        $title = "Detalles del Paciente";
        return view('patients.show', compact('patient', 'title'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request)
    {
        $data = $request->validated();

        // Si el usuario autenticado tiene rol de terapeuta, se asocia su ID
        if (auth()->user()->hasRole('therapist') && auth()->user()->therapist) {
            $data['therapist_id'] = auth()->user()->therapist->id;
        }

        Patient::create($data);

        return redirect()->route('patients.index');
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
        return redirect()->route('patients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index');
    }
    public function storeMood(Request $request)
    {
        $mood = $request->input('mood');

        $patient = Patient::where('user_id', auth()->id())->first();
        $patient->update(['last_mood' => $mood]);

        return back()->with('success', 'Estado de ánimo registrado');
    }
    public function dashboard()
    {
        $user = auth()->user();

        if (!$user->patient) {
            abort(403, 'No tenés permiso para ver estas actividades.');
        }

        $patientName = $user->patient->name;
        $activitiesCount = $user->patient->activities()->count();
        $activitiesCount = PatientActivity::where('patient_id', $user->patient->id)->count();

        // AGREGAR ESTAS LÍNEAS PARA EL PROGRESO:
        $actividadesProgramadas = PatientActivity::where('patient_id', $user->patient->id)
            ->whereBetween('activity_date', [now()->startOfWeek(), now()->endOfWeek()])
            ->count();

        $actividadesCompletadas = PatientActivity::where('patient_id', $user->patient->id)
            ->where('active', true)
            ->whereBetween('activity_date', [now()->startOfWeek(), now()->endOfWeek()])
            ->count();

        // Si no hay actividades esta semana, usar datos de ejemplo
        if ($actividadesProgramadas == 0) {
            $actividadesProgramadas = 5;
            $actividadesCompletadas = 4;
        }
        $logros = [];

        // Logro 1: Primera actividad completada
        if (PatientActivity::where('patient_id', $user->patient->id)->where('active', true)->exists()) {
            $logros[] = ['emoji' => '🎯', 'title' => 'Primera actividad completada', 'desbloqueado' => true];
        } else {
            $logros[] = ['emoji' => '❓', 'title' => 'Completa tu primera actividad', 'desbloqueado' => false];
        }

        // Logro 2: Expresó emociones
        if ($user->patient->last_mood) {
            $logros[] = ['emoji' => '💝', 'title' => 'Expresaste tus emociones', 'desbloqueado' => true];
        } else {
            $logros[] = ['emoji' => '❓', 'title' => 'Expresa cómo te sentís', 'desbloqueado' => false];
        }

        return view('patients.dashboard', compact('activitiesCount', 'patientName', 'actividadesCompletadas', 'actividadesProgramadas','logros'));
    }
    public function toggleActivity(Request $request, $activityId)
    {
        $activity = PatientActivity::where('id', $activityId)
            ->where('patient_id', auth()->user()->patient->id)
            ->firstOrFail();

        $activity->active = !$activity->active;
        $activity->save();

        $message = $activity->active ? 'Actividad completada ✅' : 'Actividad marcada como pendiente ⏳';

        return back()->with('success', $message);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing');
    }


}
