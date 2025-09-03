<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_authenticate_google_user()
    {
        $googleData = [
            'sub' => '123456789',
            'name' => 'John Doe',
            'given_name' => 'John',
            'family_name' => 'Doe',
            'email' => 'john@example.com',
            'email_verified' => true,
            'picture' => 'https://example.com/avatar.jpg'
        ];

        $response = $this->postJson('/api/auth/google', [
            'token' => 'google_token_123',
            'data' => $googleData
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'token',
                'user' => [
                    'id',
                    'name',
                    'email',
                    'role',
                    'profile_pic',
                    'completed_onboarding'
                ]
            ]);

        $this->assertDatabaseHas('users', [
            'google_id' => '123456789',
            'email' => 'john@example.com',
            'name' => 'John Doe'
        ]);
    }

    /** @test */
    public function it_updates_existing_user_on_google_login()
    {
        // Crear usuario existente
        $user = User::factory()->create([
            'email' => 'john@example.com',
            'name' => 'John Old',
            'google_id' => '123456789'
        ]);

        $response = $this->postJson('/api/auth/google', [
            'token' => 'google_token_123',
            'data' => [
                'sub' => '123456789',
                'name' => 'John Updated',
                'given_name' => 'John',
                'family_name' => 'Updated',
                'email' => 'john@example.com',
                'email_verified' => true,
                'picture' => 'https://example.com/new-avatar.jpg'
            ]
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'John Updated',
            'email' => 'john@example.com'
        ]);
    }

    /** @test */
    public function it_returns_user_data_with_authenticated_request()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $response = $this->getJson('/api/auth/user');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'email',
                'role'
            ]);
    }

    /** @test */
    public function it_requires_authentication_for_protected_routes()
    {
        $response = $this->getJson('/api/auth/user');

        $response->assertStatus(401);
    }

    /** @test */
    public function it_can_logout_user()
    {
        $user = User::factory()->create();
        $token = $user->createToken('test-token')->plainTextToken;

        // Verificar que el token funciona antes del logout
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson('/api/auth/user');
        $response->assertStatus(200);

        // Hacer logout
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/auth/logout');

        $response->assertStatus(200);

        // Verificar que los tokens se eliminaron de la base de datos
        $this->assertEquals(0, $user->tokens()->count());
    }

    /** @test */
    public function it_assigns_default_role_to_new_users()
    {
        $response = $this->postJson('/api/auth/google', [
            'token' => 'google_token_123',
            'data' => [
                'sub' => '123456789',
                'name' => 'John Doe',
                'given_name' => 'John',
                'family_name' => 'Doe',
                'email' => 'john@example.com',
                'email_verified' => true,
                'picture' => 'https://example.com/avatar.jpg'
            ]
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'google_id' => '123456789',
            'role' => 'users' // Rol por defecto
        ]);
    }

    /** @test */
    public function it_validates_required_google_data()
    {
        $response = $this->postJson('/api/auth/google', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['token', 'data', 'data.sub', 'data.name', 'data.email', 'data.email_verified']);
    }

    /** @test */
    public function it_handles_duplicate_email_with_different_google_id()
    {
        // Crear usuario con email existente pero diferente google_id
        User::factory()->create([
            'email' => 'john@example.com',
            'google_id' => '987654321'
        ]);

        $response = $this->postJson('/api/auth/google', [
            'token' => 'google_token_123',
            'data' => [
                'sub' => '123456789',
                'name' => 'John Doe',
                'given_name' => 'John',
                'family_name' => 'Doe',
                'email' => 'john@example.com',
                'email_verified' => true,
                'picture' => 'https://example.com/avatar.jpg'
            ]
        ]);

        // Debería crear un nuevo usuario o manejar el conflicto
        $response->assertStatus(200);
    }
}
