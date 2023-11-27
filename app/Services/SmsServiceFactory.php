<?php

namespace App\Services;

use App\Contracts\SmsService;
use App\Services\providers\KavenegarSmsProvider;

class SmsServiceFactory
{

    public function createSms(SmsService $service){

        return new KavenegarSmsProvider();
    }

}
