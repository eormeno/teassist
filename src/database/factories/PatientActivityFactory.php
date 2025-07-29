<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Patient;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PatientActivity>
 */
class PatientActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::all();
        $patients = Patient::all();
        $activities = Activity::all();
        $patient = $patients->random();
        $activity = $activities->random();


        return [
            'user_id' => $patient->user_id,
            'patient_id' => $patient->id,
            'activity_id' => $activity->id,
            'active' => $this->faker->boolean,
            'description' => $this->faker->text,
            'reasons' => $this->faker->text,
            'goals' => $this->faker->text,
            'indicators' => $this->faker->text,
        ];
    }
}
