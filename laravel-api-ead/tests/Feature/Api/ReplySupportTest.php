<?php

namespace Tests\Feature\Api;

use App\Models\Support;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReplySupportTest extends TestCase
{

    use UtilsTraits;
    public function test_create_reply_to_support_unauthantication(): void
    {
        $response = $this->postJson('/api/replies');

        $response->assertStatus(401);
    }

    public function test_create_reply_to_support_error_validations(): void
    {
        $response = $this->postJson('/api/replies',[], $this->defaultHeadres());

        $response->assertStatus(422);
    }

    public function test_create_reply_to_support(): void
    {

        $support = Support::factory()->create();

        $playload = [
            'support' => $support->id,
            'description' => 'test description reply support'
        ];
        $response = $this->postJson('/api/replies',$playload, $this->defaultHeadres());

        $response->assertStatus(201);
    }
}
