<?php

namespace Tests\Feature\Api\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AutTest extends TestCase
{
    public function test_fail_auth(): void
    {
        $response = $this->postJson('/api/auth', []);

        $response->assertStatus(422);
    }

    public function test_auth(): void
    {
        $user = User::factory()->create();
        
        $response = $this->postJson('/api/auth', [
            'email'=> $user->email,
            'password'=> 'password',
            'device_name' => 'test'
        ]);

        $response->assertStatus(200);
    }

    public function test_error_logout(): void
    {
        $user = User::factory()->create();
        
        $response = $this->postJson('/api/logout');

        $response->assertStatus(401);
    }

    public function test_logout(): void
    {
        $user = User::factory()->create();
        
        $token = $user->createToken('teste')->plainTextToken;
        $response = $this->postJson('/api/logout', [], [
            'Authorization' => 'Bearer '. $token
        ]);

        $response->assertStatus(200);
    }

    public function test_get_me(): void
    {
        $user = User::factory()->create();
        $token = $user->createToken('teste')->plainTextToken;

        $response = $this->getJson('/api/me', [
            'Authorization' => 'Bearer '. $token
        ]);

        $response->assertStatus(200);
    }

    public function test_error_get_me(): void
    {
        $response = $this->getJson('/api/me');

        $response->assertStatus(401);
    }
}
