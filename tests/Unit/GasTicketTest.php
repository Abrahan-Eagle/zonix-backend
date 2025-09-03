<?php

namespace Tests\Unit;

use App\Models\GasTicket;
use App\Models\Profile;
use App\Models\GasCylinder;
use App\Models\Station;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GasTicketTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_gas_ticket()
    {
        $profile = Profile::factory()->create();
        $gasCylinder = GasCylinder::factory()->create();
        $station = Station::factory()->create();

        $ticket = GasTicket::create([
            'profile_id' => $profile->id,
            'gas_cylinders_id' => $gasCylinder->id,
            'station_id' => $station->id,
            'queue_position' => 1,
            'time_position' => '09:00:00',
            'qr_code' => 'QR123456789',
            'reserved_date' => now()->toDateString(),
            'appointment_date' => now()->addDay()->toDateString(),
            'expiry_date' => now()->addDays(2)->toDateString(),
            'status' => 'pending',
        ]);

        $this->assertDatabaseHas('gas_tickets', [
            'id' => $ticket->id,
            'profile_id' => $profile->id,
            'status' => 'pending'
        ]);
    }

    /** @test */
    public function it_has_relationships()
    {
        $ticket = GasTicket::factory()->create();

        $this->assertInstanceOf(Profile::class, $ticket->profile);
        $this->assertInstanceOf(GasCylinder::class, $ticket->gasCylinder);
        $this->assertInstanceOf(Station::class, $ticket->station);
    }

    /** @test */
    public function it_can_change_status()
    {
        $ticket = GasTicket::factory()->create(['status' => 'pending']);

        $ticket->update(['status' => 'verifying']);

        $this->assertEquals('verifying', $ticket->fresh()->status);
    }

    /** @test */
    public function it_can_be_expired()
    {
        $ticket = GasTicket::factory()->expired()->create();

        $this->assertEquals('expired', $ticket->status);
        $this->assertTrue($ticket->expiry_date < now()->toDateString());
    }

    /** @test */
    public function it_can_be_dispatched()
    {
        $ticket = GasTicket::factory()->dispatched()->create();

        $this->assertEquals('dispatched', $ticket->status);
        // $this->assertTrue($ticket->asistio); // Campo no existe en la migración
    }
}
