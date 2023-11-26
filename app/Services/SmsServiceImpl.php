<?php

namespace App\Services;

use App\Contracts\SmsService;

class SmsServiceImpl implements SmsService
{
    protected $provider;

    public function __construct(SmsProvider $provider)
    {
        $this->provider = $provider;
    }

    public function sendSms($phoneNumber, $message)
    {
        return $this->provider->send($phoneNumber, $message);
    }
}
