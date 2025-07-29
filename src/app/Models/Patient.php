<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Patient extends Model
{
    use HasFactory,SoftDeletes;

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
        'user_id',
        'last_mood'
    ];
    public function user()
    {
    return $this->belongsTo(User::class);
    }

}
