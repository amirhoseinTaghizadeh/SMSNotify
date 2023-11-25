<?php

namespace App\Http\Controllers;

use App\Contracs\SmsNotifierInterface;
use App\Contracts\UserDetailInterface;
use App\Http\Requests\UserRegistrationRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UserRegister(UserRegistrationRequest $request, SmsNotifierInterface $smsNotifier, UserDetailInterface $userDetail){

        $user = $userDetail->createUser($request->validated());

        event(new UserRegistered($user->id, $smsNotifier, $userDetail));
    }
}
