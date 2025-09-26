<?php

namespace App\Services;

use App\Actions\Auth\GetResponseTokenAction;
use App\Actions\Auth\HashCheckAction;
use App\Actions\Auth\UnauthorizedResponseAction;
use App\Actions\Users\AddRoleAction;
use App\Actions\Users\GetUserByParamsAction;
use App\Contracts\UserRepositoryInterface;
use App\DTOs\RegisterDTO;

class AuthService
{
    public function __construct(
        protected AddRoleAction $addRole,
        protected GetResponseTokenAction $getResponseToken,
        protected GetUserByParamsAction $getUserByParams,
        protected HashCheckAction $hashCheck,
        protected UnauthorizedResponseAction $unauthorizedResponse,
        protected UserRepositoryInterface $userRepository
    ) {}

    public function login(array $credentials): array
    {
        # get User by Params
        $user    = $this->getUserByParams->execute('username', $credentials);
        if (!$user) $this->unauthorizedResponse->execute();

        # Check hash
        $checked = $this->hashCheck->execute($user, $credentials);
        if (!$checked) $this->unauthorizedResponse->execute();

        # Attempt credential
        if (!$token = auth()->attempt($credentials)) $this->unauthorizedResponse->execute();

        return $this->getResponseToken->execute($token);
    }

    public function register(RegisterDTO $dto)
    {
        $user = $this->userRepository->create($dto->toArray());

        # Add role
        $this->addRole->execute($dto->role, $user);

        return $user;
    }
}
