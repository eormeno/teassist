<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(PermissionsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(TherapistSeeder::class); 
        $this->call(PatientSeeder::class);   
        $this->call(ActivitySeeder::class);
        $this->call(PatientActivitySeeder::class);
    }
}

