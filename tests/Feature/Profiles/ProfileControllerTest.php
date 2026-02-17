<?php

namespace Tests\Feature;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_list_all_profiles()
    {
        Sanctum::actingAs($this->user);
        
        Profile::factory()->count(3)->create();

        $response = $this->get('/api/profiles');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     '*' => [
                         'id', 'user_id', 'firstName', 'middleName', 'lastName', 'secondLastName',
                         'photo_users', 'date_of_birth', 'maritalStatus', 'sex', 'status'
                     ]
                 ]);
    }

    /** @test */
    public function it_can_create_a_profile()
    {
        Sanctum::actingAs($this->user);
        
        // Asegurar que no existe un perfil para este usuario
        Profile::where('user_id', $this->user->id)->delete();
        
        $data = [
            'user_id' => $this->user->id,
            'firstName' => 'John',
            'lastName' => 'Doe',
            'date_of_birth' => '1990-01-01',
            'maritalStatus' => 'single',
            'sex' => 'M'
        ];

        $response = $this->post('/api/profiles', $data);

        $response->assertStatus(201)
                 ->assertJson(['message' => 'Perfil creado exitosamente.']);

        $this->assertDatabaseHas('profiles', [
            'user_id' => $this->user->id,
            'firstName' => 'John',
            'lastName' => 'Doe'
        ]);
    }

    /** @test */
    public function it_can_show_a_specific_profile()
    {
        Sanctum::actingAs($this->user);
        
        $profile = Profile::factory()->create(['user_id' => $this->user->id]);

        $response = $this->get("/api/profiles/{$this->user->id}");

        $response->assertStatus(200)
                 ->assertJson(['user_id' => $this->user->id]);
    }

    /** @test */
    public function it_can_update_a_profile()
    {
        Sanctum::actingAs($this->user);
        
        $profile = Profile::factory()->create(['user_id' => $this->user->id]);
        $data = [
            'firstName' => 'Jane',
            'lastName' => 'Doe',
            'date_of_birth' => '1990-01-01',
            'maritalStatus' => 'single',
            'sex' => 'M'
        ];

        $response = $this->post("/api/profiles/{$profile->id}", $data);

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Perfil actualizado exitosamente.']);

        $this->assertDatabaseHas('profiles', [
            'id' => $profile->id,
            'firstName' => 'Jane'
        ]);
    }

    /** @test */
    public function it_can_delete_a_profile()
    {
        Sanctum::actingAs($this->user);
        
        $profile = Profile::factory()->create(['user_id' => $this->user->id]);

        $response = $this->delete("/api/profiles/{$profile->id}");

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Perfil eliminado exitosamente']);

        $this->assertDatabaseMissing('profiles', ['id' => $profile->id]);
    }

    /** @test */
    public function it_validates_required_fields_when_creating_profile()
    {
        Sanctum::actingAs($this->user);
        
        $response = $this->post('/api/profiles', []);

        $response->assertStatus(400)
                 ->assertJsonStructure(['error']);
    }

    /** @test */
    public function it_validates_user_exists_when_creating_profile()
    {
        Sanctum::actingAs($this->user);
        
        $data = [
            'user_id' => 99999, // Usuario que no existe
            'firstName' => 'John',
            'lastName' => 'Doe',
            'date_of_birth' => '1990-01-01',
            'maritalStatus' => 'single',
            'sex' => 'M'
        ];

        $response = $this->post('/api/profiles', $data);

        $response->assertStatus(400)
                 ->assertJsonStructure(['error']);
    }
}
