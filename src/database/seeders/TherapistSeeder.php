<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Therapist;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TherapistSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $users = User::factory()
            ->count(5)
            ->create();

        foreach ($users as $user) {
            // Asignar rol therapist al usuario en Spatie
            $user->assignRole('therapist');

            // Actualizar columna 'role' en tabla users
            $user->role = 'therapist';
            $user->save();

            // Crear el registro en tabla therapists
            Therapist::create([
                'user_id' => $user->id,
                'nombre' => explode(' ', $user->name)[0],
                'apellido' => explode(' ', $user->name)[1] ?? 'Apellido',
                'dni' => fake()->unique()->numerify('########'),
                'fecha_nacimiento' => fake()->date(),
                'telefono' => fake()->phoneNumber(),
                'email' => $user->email,
                'direccion' => fake()->address(),
            ]);
        }
    }
}
