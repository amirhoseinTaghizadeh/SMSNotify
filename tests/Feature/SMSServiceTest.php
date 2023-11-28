<?php

namespace Tests\Feature;

use App\Contracts\SmsService;
use App\Services\SMSServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SMSServiceTest extends TestCase
{
    public function testSMSServiceFunctionality()
    {
        $smsServiceMock = $this->createMock(SmsService::class);

        $this->app->instance(SmsService::class, $smsServiceMock);

        $response = $this->post('/api/send-sms', [
            'phone' => '1234567890',
            'message' => 'Hello, World!',
        ]);

        $smsServiceMock->expects($this->once())
            ->method('sendSms')
            ->with('1234567890', 'Hello, World!');

        $resolvedInstance = resolve(SmsService::class);

        $this->assertInstanceOf(SmsService::class, $resolvedInstance);

        $response->assertStatus(200);
    }
}
