<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

interface AuthService
{
    public function register(Request $request): User;

    public function login(Request $request): String;

    public function logout(): void;

    public function getUser(): Authenticatable;
}
