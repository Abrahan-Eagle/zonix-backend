<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    protected $model = Profile::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $user = User::inRandomOrder()->first();
        return [
            'user_id' => $user ? $user->id : null,
            'firstName' => $this->faker->firstName,
            'middleName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'secondLastName' => $this->faker->lastName,
            'photo_users' => null, // Puedes cambiar esto según necesites
            'date_of_birth' => $this->faker->date(),
            'maritalStatus' => $this->faker->randomElement(['single', 'married']),
            'sex' => $this->faker->randomElement(['M', 'F']),
            'status' => 'completeData',
        ];
    }
}






