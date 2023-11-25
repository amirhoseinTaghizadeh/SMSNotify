<?php

namespace App\Services;

use App\Contracts\UserDetailInterface;
use App\Models\User;

class UserDetailService implements UserDetailInterface
{
    public function getUserPhoneNumber($userId)
    {
        $user = User::findOrFail($userId);
        return $user->phone;
    }

    public function createUser(array $userData)
    {
        return User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'phone' => $userData['phone'],
            'address' => $userData['address'],
            'password' => bcrypt($userData['password']),
        ]);
    }
}
