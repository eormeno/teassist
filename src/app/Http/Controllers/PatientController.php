<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Requests\PatientRequest;
use Illuminate\Support\Facades\Gate;


class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $user = auth()->user();

    //if ($user->hasRole('paciente')) {
        // Paciente: ve solo sus actividades asignadas
      //  $activities = $user->patient?->activities ?? collect();
        //return view('activities.index', compact('activities'));
    //}

    if ($user->can('view-patients')) {
        // Terapeuta u otro rol con permiso: ve todos los pacientes paginados
        $patients = Patient::paginate(5);
        return view('patients.index', compact('patients'));
    }

    // Sin permiso ni rol adecuado
    abort(403);
}

    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request)
    {
        Patient::create($request->validated());
        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        $title = "Detalles del Paciente"; // Define la variable
        return view('patients.show', compact('patient', 'title')); // Pásala a la vista
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
}
