<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Hash;

class UserService extends Facade
{
    public function login($email, $password)
    {
        $user = User::query()
            ->where('email', 'LIKE', $email)
            ->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return null;
        }

        return $user->createToken($user->email)->plainTextToken;
    }
}
