<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'), // Password predefinita
            'phone' => $this->faker->phoneNumber(), // Aggiungi un numero di telefono casuale
            'gender' => $this->faker->randomElement(['male', 'female', 'other']), // Sesso casuale
        ];
    }
}
