<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Therapist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nombre',
        'apellido',
        'dni',
        'fecha_nacimiento',
        'telefono',
        'email',
        'direccion',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}