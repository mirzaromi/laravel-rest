<?php

namespace App\Service\Implementation;

use App\Exceptions\AuthException;
use App\Models\User;
use App\Repository\AuthRepository;
use App\Service\AuthService;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthServiceImplementation implements AuthService
{
    private AuthRepository $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(Request $request): User
    {
        $request->password = bcrypt($request->password);
        return $this->authRepository->registerUser($request);
    }

    public function login(Request $request): string
    {
        $credentials = $request->validate([
           "email" => "required",
            "password" => "required"
        ]);

        if (!$token = Auth::attempt($credentials)) {
            throw new AuthException("email or password invalid");
        }

        return $token;
    }

    public function logout(): void
    {
        Auth::logout();
    }

    public function getUser(): Authenticatable
    {
        return Auth::user();
    }
}
