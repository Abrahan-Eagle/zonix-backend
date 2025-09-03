<?php

namespace Tests\Unit;

use App\Models\Profile;
use App\Models\User;
use App\Models\Station;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_profile()
    {
        $user = User::factory()->create();
        $station = Station::factory()->create();

        $profile = Profile::create([
            'user_id' => $user->id,
            'firstName' => 'John',
            'middleName' => 'Michael',
            'lastName' => 'Doe',
            'secondLastName' => 'Smith',
            'date_of_birth' => '1985-05-15',
            'maritalStatus' => 'single',
            'sex' => 'M',
            'station_id' => $station->id,
        ]);

        $this->assertDatabaseHas('profiles', [
            'id' => $profile->id,
            'user_id' => $user->id,
            'firstName' => 'John',
            'lastName' => 'Doe'
        ]);
    }

    /** @test */
    public function it_has_user_relationship()
    {
        $profile = Profile::factory()->create();

        $this->assertInstanceOf(User::class, $profile->user);
    }

    /** @test */
    public function it_has_station_relationship()
    {
        $station = Station::factory()->create();
        $profile = Profile::factory()->create(['station_id' => $station->id]);

        $this->assertInstanceOf(Station::class, $profile->station);
    }

    /** @test */
    public function it_can_have_phones()
    {
        $profile = Profile::factory()->create();

        $this->assertTrue(method_exists($profile, 'phones'));
    }

    /** @test */
    public function it_can_have_emails()
    {
        $profile = Profile::factory()->create();

        $this->assertTrue(method_exists($profile, 'emails'));
    }

    /** @test */
    public function it_can_have_documents()
    {
        $profile = Profile::factory()->create();

        $this->assertTrue(method_exists($profile, 'documents'));
    }

    /** @test */
    public function it_can_have_addresses()
    {
        $profile = Profile::factory()->create();

        $this->assertTrue(method_exists($profile, 'addresses'));
    }

    /** @test */
    public function it_can_have_gas_cylinders()
    {
        $profile = Profile::factory()->create();

        $this->assertTrue(method_exists($profile, 'gasCylinders'));
    }
}
