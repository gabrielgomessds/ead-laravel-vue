<?php

namespace Tests\Feature\Api;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use UtilsTraits;
    public function test_unauthenticated(): void
    {
        //$token = $this->createTokenUser();

        $response = $this->getJson('/api/courses');

        $response->assertStatus(401);
    }

    public function test_get_all_courses(): void
    {
        $token = $this->createTokenUser();

        $response = $this->getJson('/api/courses', $this->defaultHeadres());

        $response->assertStatus(200);
    }

    public function test_get_courses_total(): void
    {
        $courses = Course::factory()->count(10)->create();
        
        $response = $this->getJson('/api/courses', $this->defaultHeadres());

        $response->assertStatus(200)
                 ->assertJsonCount(count($courses), 'data');
    }

    public function test_get_single_course_unauthenticated(): void
    {
        
        $response = $this->getJson('/api/courses/fake_id');

        $response->assertStatus(401);
    }

    public function test_get_single_course_not_found(): void
    {
        
        $response = $this->getJson('/api/courses/fake_id', $this->defaultHeadres());

        $response->assertStatus(404);
    }

    public function test_get_single_course(): void
    {
        $course = Course::factory()->create();
        
        $response = $this->getJson("/api/courses/{$course}", $this->defaultHeadres());

        $response->assertStatus(404);
    }
}
