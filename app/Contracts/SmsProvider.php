<?php

namespace App\Contracts;

interface SmsProvider
{
    public function send($phoneNumber, $message);
}
