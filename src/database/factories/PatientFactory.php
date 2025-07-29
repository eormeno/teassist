<?php

namespace Database\Factories;

use App\Models\User;
use App\Utils\FakeUtils;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fake_first = fake()->firstName();
        $fake_last = fake()->lastName();
        $fake_email = FakeUtils::email($fake_first, $fake_last);

        $user = User::create([
            'name' => "$fake_first $fake_last",
            'email' => $fake_email,
            'password' => Hash::make(env('FAKE_USERS_PASSWORD')),
        ]);
        $user->assignRole('patient');
        return [
            'user_id' => $user->id,
            'codigo' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'apellidos' => $fake_last,
            'nombres' => $fake_first,
            'dni' => $this->faker->unique()->numerify('########'),
            'nacimiento' => $this->faker->date(),
            'sexo' => $this->faker->randomElement(['M', 'F']),
            'telefono' => $this->faker->phoneNumber(),
            'email' => $fake_email,
            'direccion' => $this->faker->address(),
            'observaciones' => $this->faker->optional()->sentence(),

        ];
    }
}
