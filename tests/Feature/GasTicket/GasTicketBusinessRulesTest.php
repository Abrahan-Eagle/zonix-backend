<?php

namespace Tests\Feature;

use App\Models\GasTicket;
use App\Models\GasCylinder;
use App\Models\Profile;
use App\Models\Station;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class GasTicketBusinessRulesTest extends TestCase
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
    public function it_enforces_21_day_rule_for_internal_users()
    {
        // Crear un ticket despachado hace 15 días (menos de 21)
        $oldTicket = GasTicket::factory()->create([
            'profile_id' => $this->profile->id,
            'gas_cylinders_id' => $this->gasCylinder->id,
            'station_id' => $this->station->id,
            'status' => 'dispatched',
            'appointment_date' => Carbon::now()->subDays(15)->toDateString(),
        ]);

        $response = $this->createTicketRequest();

        $response->assertStatus(400)
            ->assertJson(['message' => 'You must wait 6 more days before generating a new ticket.']);
    }

    /** @test */
    public function it_allows_ticket_creation_after_21_days()
    {
        // Crear un ticket despachado hace 25 días (más de 21)
        $oldTicket = GasTicket::factory()->create([
            'profile_id' => $this->profile->id,
            'gas_cylinders_id' => $this->gasCylinder->id,
            'station_id' => $this->station->id,
            'status' => 'dispatched',
            'appointment_date' => Carbon::now()->subDays(25)->toDateString(),
        ]);

        $response = $this->createTicketRequest();

        $response->assertStatus(201);
    }

    /** @test */
    public function it_enforces_sunday_only_for_external_users()
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

    /** @test */
    public function it_allows_external_users_on_sundays()
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
    public function it_enforces_daily_limit_of_200_tickets_per_station()
    {
        // Crear 200 tickets para la estación
        GasTicket::factory()->count(200)->create([
            'station_id' => $this->station->id,
            'appointment_date' => Carbon::now()->addDay()->toDateString(),
        ]);

        $response = $this->createTicketRequest();

        $response->assertStatus(400)
            ->assertJson(['message' => 'Daily appointment limit reached for this station']);
    }

    /** @test */
    public function it_prevents_duplicate_pending_tickets()
    {
        // Crear un ticket pendiente
        GasTicket::factory()->create([
            'profile_id' => $this->profile->id,
            'gas_cylinders_id' => $this->gasCylinder->id,
            'station_id' => $this->station->id,
            'status' => 'pending',
        ]);

        $response = $this->createTicketRequest();

        $response->assertStatus(400)
            ->assertJson(['message' => 'You cannot generate a new ticket while another one is pending, verifying, or waiting.']);
    }

    /** @test */
    public function it_assigns_correct_queue_position()
    {
        // Crear 5 tickets existentes
        GasTicket::factory()->count(5)->create([
            'station_id' => $this->station->id,
            'appointment_date' => Carbon::now()->addDay()->toDateString(),
        ]);

        $response = $this->createTicketRequest();

        $response->assertStatus(201);

        // Verificar que el nuevo ticket tiene posición 6
        $this->assertDatabaseHas('gas_tickets', [
            'profile_id' => $this->profile->id,
            'queue_position' => 6
        ]);
    }

    /** @test */
    public function it_generates_unique_qr_code()
    {
        $response = $this->createTicketRequest();

        $response->assertStatus(201);

        $ticket = GasTicket::where('profile_id', $this->profile->id)->first();
        $this->assertNotNull($ticket->qr_code);
        $this->assertEquals($this->gasCylinder->gas_cylinder_code, $ticket->qr_code);
    }

    /** @test */
    public function it_validates_station_days_available()
    {
        // Configurar estación para que solo permita citas los lunes
        $this->station->update(['days_available' => 'Monday']);

        // Simular que es martes
        Carbon::setTestNow(Carbon::create(2024, 1, 16)); // Martes

        $response = $this->createTicketRequest();

        $response->assertStatus(400)
            ->assertJson(['message' => 'Appointments are not allowed at the assigned station today']);

        Carbon::setTestNow(); // Reset
    }
}
