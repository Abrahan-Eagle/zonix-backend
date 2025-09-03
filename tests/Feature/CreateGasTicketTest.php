<?php

namespace Tests\Feature;

use App\Models\Profile;
use App\Models\GasCylinder;
use App\Models\Station;
use App\Models\GasTicket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;
use Carbon\Carbon;

class CreateGasTicketTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;
    protected Station $station;
    protected Profile $profile;
    protected GasCylinder $gasCylinder;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Crear datos base para los tests
        $this->user = User::factory()->create();
        $this->station = Station::factory()->create([
            'days_available' => 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday',
            'active' => true
        ]);
        $this->profile = Profile::factory()->create([
            'user_id' => $this->user->id,
            'station_id' => $this->station->id
        ]);
        $this->gasCylinder = GasCylinder::factory()->create([
            'profile_id' => $this->profile->id,
            'approved' => true
        ]);
        
        // Asignar el perfil al usuario
        $this->user->profile()->save($this->profile);
    }

    private function createTicketRequest($data = [])
    {
        $defaultData = [
            'profile_id' => $this->profile->id,
            'gas_cylinders_id' => $this->gasCylinder->id,
            'is_external' => false
        ];

        return $this->actingAs($this->user)
            ->postJson('/api/tickets', array_merge($defaultData, $data));
    }

    /** @test */
    public function it_creates_a_ticket_successfully()
    {
        $response = $this->createTicketRequest();

        $response->assertStatus(201);

        $this->assertDatabaseHas('gas_tickets', [
            'profile_id' => $this->profile->id,
            'gas_cylinders_id' => $this->gasCylinder->id,
            'station_id' => $this->station->id,
            'status' => 'pending'
        ]);
    }

    /** @test */
    public function it_returns_error_if_no_station_is_assigned()
    {
        // Crear perfil sin estación asignada
        $profileWithoutStation = Profile::factory()->create([
            'user_id' => $this->user->id,
            'station_id' => null
        ]);

        $response = $this->actingAs($this->user)
            ->postJson('/api/tickets', [
                'profile_id' => $profileWithoutStation->id,
                'gas_cylinders_id' => $this->gasCylinder->id,
                'is_external' => false
            ]);

        $response->assertStatus(400)
            ->assertJson(['message' => 'No station assigned to the user']);
    }

    /** @test */
    public function it_prevents_duplicated_tickets_for_pending_status()
    {
        // Crear un ticket existente en estado pendiente
        GasTicket::factory()->create([
            'profile_id' => $this->profile->id,
            'gas_cylinders_id' => $this->gasCylinder->id,
            'station_id' => $this->station->id,
            'status' => 'pending'
        ]);

        $response = $this->createTicketRequest();

        $response->assertStatus(400)
            ->assertJson(['message' => 'You cannot generate a new ticket while another one is pending, verifying, or waiting.']);
    }

    /** @test */
    public function it_checks_ticket_creation_on_sundays_for_external_users()
    {
        // Simular que es domingo
        Carbon::setTestNow(Carbon::create(2024, 1, 14)); // Domingo

        $response = $this->actingAs($this->user)
            ->postJson('/api/tickets', [
                'profile_id' => $this->profile->id,
                'gas_cylinders_id' => $this->gasCylinder->id,
                'is_external' => true,
                'station_id' => $this->station->id
            ]);

        $response->assertStatus(201);

        Carbon::setTestNow(); // Reset
    }

    /** @test */
    public function it_rejects_external_users_on_non_sundays()
    {
        // Simular que no es domingo
        Carbon::setTestNow(Carbon::create(2024, 1, 15)); // Lunes

        $response = $this->actingAs($this->user)
            ->postJson('/api/tickets', [
                'profile_id' => $this->profile->id,
                'gas_cylinders_id' => $this->gasCylinder->id,
                'is_external' => true,
                'station_id' => $this->station->id
            ]);

        $response->assertStatus(400)
            ->assertJson(['message' => 'External appointments are only allowed on Sundays']);

        Carbon::setTestNow(); // Reset
    }
}
