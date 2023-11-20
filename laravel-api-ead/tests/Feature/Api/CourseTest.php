<?php

namespace Tests\Feature\Api;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use UtilsTraits;

    public function test_unauthenticated()
    {
        $response = $this->getJson('/api/courses');

        $response->assertStatus(401);
    }

    public function test_get_all_courses()
    {
        $response = $this->getJson('/api/courses', $this->defaultHeaders());

        $response->assertStatus(200);
    }

    public function test_get_all_courses_total()
    {
        Course::factory()->count(10)->create();

        $response = $this->getJson('/api/courses', $this->defaultHeaders());

        $response->assertStatus(200)
                    ->assertJsonCount(10, 'data');
    }

    public function test_get_single_course_unauthenticated()
    {
        $response = $this->getJson('/api/courses/fake_id');

        $response->assertStatus(401);
    }

    public function test_get_single_course_not_found()
    {
        $response = $this->getJson('/api/courses/fake_id', $this->defaultHeaders());

        $response->assertStatus(404);
    }

    public function test_get_single_course()
    {
        $course = Course::factory()->create();

        $response = $this->getJson("/api/courses/{$course->id}", $this->defaultHeaders());

        $response->assertStatus(200);
    }
}