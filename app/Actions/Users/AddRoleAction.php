<?php

namespace App\Actions\Users;

use App\Models\User;

class AddRoleAction
{
    public function execute(array $role, User $user): void
    {
        $user->assignRole($role);
    }
}
