<?php

namespace App\Actions\Auth;

use Illuminate\Support\Facades\Hash;

class HashCheckAction
{
    public function execute($user, $credentials)
    {
        return Hash::check($credentials['password'], $user->password);
    }
}
