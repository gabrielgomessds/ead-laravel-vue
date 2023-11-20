<?php

namespace Tests\Feature\Api;
use App\Models\User;

trait UtilsTraits
{

    public function createUser()
    {
        $user = User::factory()->create();

        return $user;
    }
    public function createTokenUser()
    {
        $user = $this->createUser();
        //$user = User::factory()->create();
        
        $token = $user->createToken('teste')->plainTextToken;

        return $token;
    }

    public function defaultHeaders()
    {
        $token = $this->createTokenUser();
        return [
            'Authorization' => "Bearer {$token}",
        ];
    }
}
