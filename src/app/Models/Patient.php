<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'apellidos',
        'nombres',
        'dni',
        'nacimiento',
        'sexo',
        'telefono',
        'email',
        'direccion',
        'observaciones',
        'therapist_id',  // nuevo campo
    ];

    // Relación paciente → terapeuta
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function activities()
    {
        return $this->hasMany(PatientActivity::class);
    }

    public function therapist()
    {
        return $this->belongsTo(Therapist::class);
    }
}
