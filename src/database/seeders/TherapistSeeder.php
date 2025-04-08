<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;



class TherapistSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->therapist()->count(5)->create()->each(function ($user) {
            $user->assignRole('terapeuta');
    });
}
}