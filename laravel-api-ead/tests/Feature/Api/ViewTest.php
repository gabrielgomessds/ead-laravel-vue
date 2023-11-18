<?php

namespace Tests\Feature\Api;

use App\Models\Lesson;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    use UtilsTraits;

    public function test_make_viewed_unauthorized(): void
    {
        $response = $this->postJson('/api/lessons/viewed');

        $response->assertStatus(401);
    }

    public function test_make_viewed_invalid_validator(): void
    {
        $playload = [];
        $response = $this->postJson(
            '/api/lessons/viewed', 
            $playload, 
            $this->defaultHeadres());

        $response->assertStatus(422);
    }

    public function test_make_viewed_invalid_lesson(): void
    {
        $playload = [
            'lesson' => 'fake_lesson'
        ];

        $response = $this->postJson(
            '/api/lessons/viewed', 
            $playload, 
            $this->defaultHeadres());

        $response->assertStatus(422);
    }

    public function test_make_viewed(): void
    {
        $lesson = Lesson::factory()->create();

        $playload = ['lesson' => $lesson->id];
        
        $response = $this->postJson(
            '/api/lessons/viewed', 
            $playload, 
            $this->defaultHeadres());

        $response->assertStatus(200);
    }
}
