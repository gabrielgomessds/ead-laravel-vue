<?php

namespace Tests\Feature\Api;

use App\Models\Support;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SupportTest extends TestCase
{

    use UtilsTraits;
    /**
     * A basic feature test example.
     */
    public function test_get_my_supports_unauthanticated(): void
    {
        $response = $this->getJson('/api/my-supports');

        $response->assertStatus(401);
    }

    public function test_get_my_supports(): void
    {
        $user = $this->createUser();

        $token = $user->createToken('teste')->plainTextToken;

        Support::factory()->count(50)->create([
            'user_id' => $user->id,
        ]);

        Support::factory()->count(50)->create();


        $response = $this->getJson('/api/my-supports', [
            'Authorization'=> "Bearer {$token}",
        ]);

        $response->assertStatus(200)
                ->assertJsonCount(50, 'data');
    }
}
