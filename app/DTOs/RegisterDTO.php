<?php

namespace App\DTOs;

use Illuminate\Support\Facades\Hash;

class RegisterDTO
{
    public function __construct(
        public string $name,
        public string $username,
        public string $email,
        public string $password,
        public ?array $role,
    ) {}

    public function toArray(): array
    {
        return [
            'name'      => $this->name,
            'username'  => $this->username,
            'email'     => $this->email,
            'password'  => Hash::make($this->password),
        ];
    }
}
