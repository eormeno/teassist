<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\PatientActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.patient-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string',
        ]);

        // Buscar paciente por código
        $patient = Patient::where('codigo', $request->codigo)->first();

        if (!$patient) {
            return back()->withErrors(['code' => 'Código inválido.'])->withInput();
        }

        // Autenticar al usuario asociado al paciente
        Auth::login($patient->user);

        return redirect('/patient/dashboard');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/patient-login');
    }

    public function index()
    {
        $user = auth()->user();
        $patient = $user->patient;

        $assignedActivities = PatientActivity::with('activity')
            ->where('patient_id', $patient->id)
            ->orderBy('created_at', 'desc')
            ->get();
        $Actividades = PatientActivity::with('activity')
            ->where('patient_id', $patient->id)
            ->orderBy('created_at', 'desc')
            ->pluck('activity_id');

        $activities = Activity::wherein('id',$Actividades)->get();
        $completadasSemana = PatientActivity::where('patient_id', $patient->id)
            ->whereBetween('completed_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->count();
        $actividadesSemana = PatientActivity::where('patient_id', $patient->id)
            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->count();

        // también pasás otras variables si las necesitás
        return view('patients.dashboard', compact('assignedActivities', 'activities'/* otras variables */));
    }

    public function storeMood(Request $request)
{
    $request->validate([
        'mood' => 'required|in:feliz,emocionado,neutral,ansioso,triste'
    ]);

    $user = auth()->user();

    if ($user->patient) {
        $user->patient->update([
            'last_mood' => $request->mood
        ]);

        return back()->with('success', '¡Estado de ánimo guardado correctamente!');
    }

    return back()->withErrors(['error' => 'No se pudo guardar tu estado de ánimo.']);
}
}

