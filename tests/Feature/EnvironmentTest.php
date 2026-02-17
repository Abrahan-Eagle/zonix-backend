<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EnvironmentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test to verify the app is running.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Verify database connection is working (sqlite :memory:)
     */
    public function test_database_connection_is_working(): void
    {
        $this->assertDatabaseCount('users', 0);
    }
}
