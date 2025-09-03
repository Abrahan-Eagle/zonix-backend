<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\GasCylinder;
use App\Models\Station;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GasTicket>
 */
class GasTicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $appointmentDate = Carbon::now()->addDay();
        
        return [
            'queue_position' => $this->faker->numberBetween(1, 200),
            'time_position' => $this->faker->time('H:i:s'),
            'qr_code' => 'QR' . $this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'reserved_date' => Carbon::now()->toDateString(),
            'appointment_date' => $appointmentDate->toDateString(),
            'expiry_date' => $appointmentDate->addDay()->toDateString(),
            'status' => $this->faker->randomElement(['pending', 'verifying', 'waiting', 'dispatched', 'canceled', 'expired']),
            // 'asistio' => $this->faker->boolean(), // Campo no existe en la migración
            'profile_id' => Profile::factory(),
            'gas_cylinders_id' => GasCylinder::factory(),
            'station_id' => Station::factory(),
        ];
    }

    /**
     * Indicate that the ticket is pending.
     */
    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'pending',
        ]);
    }

    /**
     * Indicate that the ticket is verifying.
     */
    public function verifying(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'verifying',
        ]);
    }

    /**
     * Indicate that the ticket is waiting.
     */
    public function waiting(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'waiting',
        ]);
    }

    /**
     * Indicate that the ticket is dispatched.
     */
    public function dispatched(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'dispatched',
            // 'asistio' => true, // Campo no existe en la migración
        ]);
    }

    /**
     * Indicate that the ticket is canceled.
     */
    public function canceled(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'canceled',
        ]);
    }

    /**
     * Indicate that the ticket is expired.
     */
    public function expired(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'expired',
            'expiry_date' => Carbon::now()->subDay()->toDateString(),
        ]);
    }
}
