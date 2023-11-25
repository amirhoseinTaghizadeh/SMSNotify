<?php

namespace App\Contracs;

interface SmsNotifierInterface
{
    public function sendSms($phoneNumber, $message);
}
