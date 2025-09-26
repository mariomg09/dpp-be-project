<?php

namespace App\Actions\Auth;

use Tymon\JWTAuth\Facades\JWTAuth;

class GetResponseTokenAction
{
    public function execute($token): array
    {
        return [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ];
    }
}
