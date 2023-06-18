<?php

namespace App\Repository\Implementation;

use App\Models\User;
use App\Repository\AuthRepository;
use Illuminate\Http\Request;

class AuthRepositoryImplementation implements AuthRepository
{
    public function registerUser(Request $request): User
    {
        return User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password
        ]);
    }
}
