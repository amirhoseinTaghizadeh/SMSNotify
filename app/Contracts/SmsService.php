<?php

namespace App\Contracts;

interface SmsService
{
    public function sendSms($phoneNumber, $message);
}
