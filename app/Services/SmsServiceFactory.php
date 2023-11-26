<?php

namespace App\Services;

class SmsServiceFactory
{
    public static function create(SmsProvider $provider)
    {
        return new SmsServiceImpl($provider);
    }
}
