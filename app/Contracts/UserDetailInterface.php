<?php

namespace App\Contracts;

interface UserDetailInterface
{
    public function getUserPhoneNumber($userId);

    public function createUser(array $userData);
}
