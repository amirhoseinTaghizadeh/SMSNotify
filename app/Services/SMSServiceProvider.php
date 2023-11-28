<?php

namespace App\Services;

use App\Contracts\SmsService;
use App\Services\providers\KavenegarSmsProvider;

class SMSServiceProvider implements SmsService {
    public function sendSMS($phoneNumber, $message) {
        $provider = new KavenegarSmsProvider();
        $provider->sendSMS($phoneNumber, $message);
    }
}
