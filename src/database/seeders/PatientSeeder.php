<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\Therapist;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PatientSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $therapists = Therapist::all();
        $therapistCount = $therapists->count();
        $i = 0;

        $users = User::factory()
            ->count(10)
            ->create();

        foreach ($users as $user) {
            // Asignar rol patient al usuario con Spatie
            $user->assignRole('patient');

            // Actualizar la columna role en la tabla users para que refleje el rol 'patient'
            $user->role = 'patient';
            $user->save();

            // Crear paciente con todos los campos obligatorios, asignando terapeuta en orden circular
            Patient::create([
                'user_id' => $user->id,
                'codigo' => fake()->unique()->regexify('[A-Z]{3}[0-9]{3}'),
                'nombres' => explode(' ', $user->name)[0],
                'apellidos' => explode(' ', $user->name)[1] ?? 'Apellido',
                'dni' => fake()->unique()->numerify('########'),
                'nacimiento' => fake()->date(),
                'sexo' => fake()->randomElement(['M', 'F']),
                'telefono' => fake()->phoneNumber(),
                'email' => $user->email,
                'direccion' => fake()->address(),
                'observaciones' => '',
                'therapist_id' => $therapists[$i % $therapistCount]->id,
            ]);

            $i++;
        }
    }
}

