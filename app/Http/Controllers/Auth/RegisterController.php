<?php

namespace App\Http\Controllers\Auth;

use App\DTOs\RegisterDTO;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Services\AuthService;

class RegisterController
{
    public function __construct(
        protected AuthService $authService
    ) {}

    public function register(RegisterRequest $request)
    {
        # Assign Register DTO
        $dto    = new RegisterDTO(...$request->validated());

        # Get Result
        $result = $this->authService->register($dto);

        return response()->json($result);
    }
}
