<?php

namespace Tests\Feature\Api;

use App\Models\Lesson;
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

    public function test_get_supports_unauthantication(): void
    {

        $response = $this->getJson('/api/supports');

        $response->assertStatus(401);
    }

    public function test_get_supports(): void
    {
        Support::factory()->count(50)->create();

        $response = $this->getJson('/api/supports', $this->defaultHeadres());

        $response->assertStatus(200)
                 ->assertJsonCount(50, 'data');
    }


    public function test_get_supports_filter_lesson(): void
    {
        $lesson = Lesson::factory()->create();
        Support::factory()->count(50)->create();
        Support::factory()->count(10)->create([
            'lesson_id' => $lesson->id,
        ]);

        $playload = ['lesson' => $lesson->id];

        $response = $this->json('GET','/api/supports', $playload, $this->defaultHeadres());

        $response->assertStatus(200)
                 ->assertJsonCount(10, 'data');
    }

    public function test_create_support_error_validations(): void
    {

        $response = $this->postJson('/api/supports', [], $this->defaultHeadres());

        $response->assertStatus(422);
    }

    public function test_create_support(): void
    {

        $lesson = Lesson::factory()->create();

        $playload = [
            'lesson' => $lesson->id,
            'status' => 'P',
            'description' =>'ajdjahdjahdjahdjs',
        ];

        $response = $this->postJson('/api/supports', $playload, $this->defaultHeadres());
        $response->assertStatus(201);
    }
}
