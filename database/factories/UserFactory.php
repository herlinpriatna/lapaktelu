<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = User::class;

    public function definition()
    {
        return [
            'namalengkap' => $this->faker->name, // If you want to include namalengkap, you can keep it
            'username' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$...hashedpassword...', // Your hashed password here
            'nomorHP' => null, // Example for nomorHP
            'alamat' => $this->faker->address, // Example for alamat
            'fotoProfil' => null, // Example for fotoProfil, set to null if not used
            'remember_token' => Str::random(10),
            'email_verified_at' => null,
            'created_at' => null,
            'updated_at' => null,
        ];
    
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
