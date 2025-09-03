<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Profile;
use App\Models\GasTicket;
use App\Models\GasCylinder;
use App\Models\Station;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;

class RoleBasedAccessTest extends TestCase
{
    use RefreshDatabase;

    protected Station $station;
    protected Profile $profile;
    protected GasCylinder $gasCylinder;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->station = Station::factory()->create();
        $this->profile = Profile::factory()->create(['station_id' => $this->station->id]);
        $this->gasCylinder = GasCylinder::factory()->create([
            'profile_id' => $this->profile->id,
            'approved' => true
        ]);
    }

    /** @test */
    public function regular_user_can_create_tickets()
    {
        $user = User::factory()->create(['role' => 'users']);
        $user->profile()->save($this->profile);
        Sanctum::actingAs($user);

        $response = $this->postJson('/api/tickets', [
            'user_id' => $user->id,
            'gas_cylinders_id' => $this->gasCylinder->id,
            'is_external' => false
        ]);

        $response->assertStatus(201);
    }

    /** @test */
    public function regular_user_can_view_own_tickets()
    {
        $user = User::factory()->create(['role' => 'users']);
        $user->profile()->save($this->profile);
        Sanctum::actingAs($user);

        $ticket = GasTicket::factory()->create([
            'profile_id' => $this->profile->id,
            'gas_cylinders_id' => $this->gasCylinder->id,
            'station_id' => $this->station->id
        ]);

        $response = $this->getJson("/api/tickets/{$user->id}");

        $response->assertStatus(200)
            ->assertJsonCount(1);
    }

    /** @test */
    public function sales_admin_can_verify_tickets()
    {
        $user = User::factory()->create(['role' => 'users']);
        $user->profile()->save($this->profile);
        
        $salesAdmin = User::factory()->create(['role' => 'sales_admin']);
        Sanctum::actingAs($salesAdmin);

        $ticket = GasTicket::factory()->create([
            'profile_id' => $this->profile->id,
            'gas_cylinders_id' => $this->gasCylinder->id,
            'station_id' => $this->station->id,
            'status' => 'pending'
        ]);

        $response = $this->postJson("/api/sales-admin/tickets/{$ticket->id}/verify");

        $response->assertStatus(200)
            ->assertJson(['success' => true]);

        $this->assertDatabaseHas('gas_tickets', [
            'id' => $ticket->id,
            'status' => 'verifying'
        ]);
    }

    /** @test */
    public function sales_admin_can_mark_tickets_as_waiting()
    {
        $user = User::factory()->create(['role' => 'users']);
        $user->profile()->save($this->profile);
        
        $salesAdmin = User::factory()->create(['role' => 'sales_admin']);
        Sanctum::actingAs($salesAdmin);

        $ticket = GasTicket::factory()->create([
            'profile_id' => $this->profile->id,
            'gas_cylinders_id' => $this->gasCylinder->id,
            'station_id' => $this->station->id,
            'status' => 'verifying'
        ]);

        $response = $this->postJson("/api/sales-admin/tickets/{$ticket->id}/waiting");

        $response->assertStatus(200)
            ->assertJson(['success' => true]);

        $this->assertDatabaseHas('gas_tickets', [
            'id' => $ticket->id,
            'status' => 'waiting'
        ]);
    }

    /** @test */
    public function sales_admin_can_cancel_tickets()
    {
        $user = User::factory()->create(['role' => 'users']);
        $user->profile()->save($this->profile);
        
        $salesAdmin = User::factory()->create(['role' => 'sales_admin']);
        Sanctum::actingAs($salesAdmin);

        $ticket = GasTicket::factory()->create([
            'profile_id' => $this->profile->id,
            'gas_cylinders_id' => $this->gasCylinder->id,
            'station_id' => $this->station->id,
            'status' => 'verifying'
        ]);

        $response = $this->postJson("/api/sales-admin/tickets/{$ticket->id}/cancel");

        $response->assertStatus(200)
            ->assertJson(['success' => true]);

        $this->assertDatabaseHas('gas_tickets', [
            'id' => $ticket->id,
            'status' => 'canceled'
        ]);
    }

    /** @test */
    public function dispatcher_can_dispatch_tickets()
    {
        $user = User::factory()->create(['role' => 'users']);
        $user->profile()->save($this->profile);
        
        $dispatcher = User::factory()->create(['role' => 'dispatcher']);
        Sanctum::actingAs($dispatcher);

        $ticket = GasTicket::factory()->create([
            'profile_id' => $this->profile->id,
            'gas_cylinders_id' => $this->gasCylinder->id,
            'station_id' => $this->station->id,
            'status' => 'waiting'
        ]);

        $response = $this->postJson("/api/dispatch/tickets/{$ticket->id}/dispatch");

        $response->assertStatus(200)
            ->assertJson(['success' => true]);

        $this->assertDatabaseHas('gas_tickets', [
            'id' => $ticket->id,
            'status' => 'dispatched'
        ]);
    }

    /** @test */
    public function dispatcher_can_scan_qr_codes()
    {
        $dispatcher = User::factory()->create(['role' => 'dispatcher']);
        Sanctum::actingAs($dispatcher);

        $ticket = GasTicket::factory()->create([
            'profile_id' => $this->profile->id,
            'gas_cylinders_id' => $this->gasCylinder->id,
            'station_id' => $this->station->id,
            'status' => 'waiting',
            'qr_code' => 'TEST123456'
        ]);

        $response = $this->postJson("/api/dispatch/tickets/TEST123456/qr-code");

        $response->assertStatus(200);
    }

    /** @test */
    public function regular_user_cannot_verify_tickets()
    {
        $user = User::factory()->create(['role' => 'users']);
        $user->profile()->save($this->profile);
        Sanctum::actingAs($user);

        $ticket = GasTicket::factory()->create([
            'profile_id' => $this->profile->id,
            'gas_cylinders_id' => $this->gasCylinder->id,
            'station_id' => $this->station->id,
            'status' => 'pending'
        ]);

        $response = $this->postJson("/api/sales-admin/tickets/{$ticket->id}/verify");

        $response->assertStatus(403); // Forbidden
    }

    /** @test */
    public function sales_admin_cannot_dispatch_tickets()
    {
        $salesAdmin = User::factory()->create(['role' => 'sales_admin']);
        Sanctum::actingAs($salesAdmin);

        $ticket = GasTicket::factory()->create([
            'profile_id' => $this->profile->id,
            'gas_cylinders_id' => $this->gasCylinder->id,
            'station_id' => $this->station->id,
            'status' => 'waiting'
        ]);

        $response = $this->postJson("/api/dispatch/tickets/{$ticket->id}/dispatch");

        $response->assertStatus(403); // Forbidden
    }

    /** @test */
    public function it_validates_ticket_status_transitions()
    {
        $salesAdmin = User::factory()->create(['role' => 'sales_admin']);
        Sanctum::actingAs($salesAdmin);

        // Intentar verificar un ticket que no está en estado pending
        $ticket = GasTicket::factory()->create([
            'profile_id' => $this->profile->id,
            'gas_cylinders_id' => $this->gasCylinder->id,
            'station_id' => $this->station->id,
            'status' => 'waiting' // Estado incorrecto para verificar
        ]);

        $response = $this->postJson("/api/sales-admin/tickets/{$ticket->id}/verify");

        $response->assertStatus(400)
            ->assertJson(['success' => false]);
    }

    /** @test */
    public function it_validates_dispatcher_ticket_status_transitions()
    {
        $dispatcher = User::factory()->create(['role' => 'dispatcher']);
        Sanctum::actingAs($dispatcher);

        // Intentar despachar un ticket que no está en estado waiting
        $ticket = GasTicket::factory()->create([
            'profile_id' => $this->profile->id,
            'gas_cylinders_id' => $this->gasCylinder->id,
            'station_id' => $this->station->id,
            'status' => 'pending' // Estado incorrecto para despachar
        ]);

        $response = $this->postJson("/api/dispatch/tickets/{$ticket->id}/dispatch");

        $response->assertStatus(400)
            ->assertJson(['success' => false]);
    }
}
