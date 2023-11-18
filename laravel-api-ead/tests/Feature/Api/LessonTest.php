<?php

namespace Tests\Feature\Api;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LessonTest extends TestCase
{
    use UtilsTraits;
    public function test_get_lessons_unauthenticated(): void
    {
        $response = $this->getJson('/api/modules/fake_value/lessons');

        $response->assertStatus(401);
    }

    public function test_get_lessons_not_found(): void
    {
        $response = $this->get('/api/modules/fake_value/lessons', $this->defaultHeadres());

        $response->assertStatus(200)
                  ->assertJsonCount(0, 'data');
    }

    public function test_get_lessons_module(): void
    {
        $course = Course::factory()->create();
        
        $response = $this->getJson("/api/modules/{$course->id}/lessons", $this->defaultHeadres());

        $response->assertStatus(200);
    }

    public function test_get_lessons_of_module_total(): void
    {
        $module = Module::factory()->create();
        Lesson::factory()->count(10)->create([
            'module_id' => $module->id
        ]);
        
        $response = $this->getJson("/api/modules/{$module->id}/lessons", $this->defaultHeadres());

        $response->assertStatus(200)
                 ->assertJsonCount(10, 'data');
    }

    public function test_get_single_lessons_unauthenticated(): void
    {
        
        $response = $this->getJson("/api/lessons");

        $response->assertStatus(401);
    }

    public function test_get_single_lessons_not_found(): void
    {
        
        $response = $this->getJson("/api/lessons/fake_value", $this->defaultHeadres());

        $response->assertStatus(404);
    }

    public function test_get_single_lesson(): void
    {
        $lesson = Lesson::factory()->create();
        
        $response = $this->getJson("/api/lessons/{$lesson->id}", $this->defaultHeadres());

        $response->assertStatus(200);
    }
}
