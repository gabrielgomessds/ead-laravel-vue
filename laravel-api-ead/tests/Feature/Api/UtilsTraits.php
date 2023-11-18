<?php

namespace Tests\Feature\Api;
use App\Models\User;

trait UtilsTraits
{
    public function createTokenUser()
    {
        $user = User::factory()->create();
        
        $token = $user->createToken('teste')->plainTextToken;

        return $token;
    }

    public function defaultHeadres()
    {
        $token = $this->createTokenUser();
        return [
            'Authorization' => "Bearer {$token}",
        ];
    }
}
