<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Http\Request;

interface AuthRepository
{
    public function registerUser(Request $request): User;

}
