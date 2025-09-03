<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Station>
 */
class StationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company() . ' Gas Station',
            'location' => $this->faker->address(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'contact_number' => $this->faker->numerify('##########'), // Solo números, máximo 10 dígitos
            'responsible_person' => $this->faker->name(),
            'days_available' => 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday',
            'opening_time' => '08:00:00',
            'closing_time' => '18:00:00',
            'active' => true,
            'code' => 'ST' . $this->faker->unique()->numberBetween(1000, 9999),
        ];
    }

    /**
     * Indicate that the station is inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'active' => false,
        ]);
    }

    /**
     * Indicate that the station is for external users (Sundays only).
     */
    public function external(): static
    {
        return $this->state(fn (array $attributes) => [
            'days_available' => 'Sunday',
            'opening_time' => '09:00:00',
            'closing_time' => '17:00:00',
        ]);
    }
}
