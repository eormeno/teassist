<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Usuarios con rol de paciente
    public function patient()
    {
        return $this->hasOne(Patient::class);
    }
    //Pacientes asignados a un terapeuta
    public function assignedPatients()
    {
        return $this->belongsToMany(User::class, 'patient_therapist', 'therapist_id', 'patient_id');
    }
    // Terapeutas asignados a un paciente
    public function therapists()
    {
        return $this->belongsToMany(User::class, 'patient_therapist', 'patient_id', 'therapist_id');
    }
    // Alias para acceder directamente a los datos de pacientes asignados
    public function myPatients()
    {
        return $this->assignedPatients()->with('patient');
    }
}
