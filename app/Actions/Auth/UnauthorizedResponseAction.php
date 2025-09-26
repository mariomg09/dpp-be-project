<?php

namespace App\Actions\Auth;

class UnauthorizedResponseAction
{
    public function execute()
    {
        throw new \Exception("Unauthorized");
    }
}
