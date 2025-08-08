<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Patient;



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

    $patient = Patient::where('codigo', $request->codigo)->first();


    if (!$patient) {
        return back()->withErrors(['codigo' => 'Código inválido.'])->withInput();
    }

    if (!$patient->user) {
        return back()->withErrors(['codigo' => 'Paciente sin usuario asociado.'])->withInput();
    }

    $user = $patient->user;


    Auth::loginUsingId($user->id);
    $request->session()->regenerate();

    return redirect('/dashboard');
}


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/patient-login');
    }
}
