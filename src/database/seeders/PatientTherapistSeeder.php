<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PatientTherapistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Obtener todos los terapeutas
         $therapists = User::role('therapist')->get();

         // Obtener todos los pacientes (usuarios con rol 'registered')
         $patients = User::role('patient')->get();

         foreach ($therapists as $therapist) {
             // Asignar entre 1 y 5 pacientes aleatorios a cada terapeuta
             $therapist->assignedPatients()->syncWithoutDetaching(
                 $patients->random(rand(1, 5))->pluck('id')->toArray()
             );
        }
    }
}
