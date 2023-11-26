<?php

namespace App\Http\Controllers;

use App\Contracts\SmsService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function sendSms(SmsService $sms){
            $phoneNumber    = "+989148890122";
            $message        = "hello factory design pattern";

            $sms->sendSms($phoneNumber,$message);
    }
}
