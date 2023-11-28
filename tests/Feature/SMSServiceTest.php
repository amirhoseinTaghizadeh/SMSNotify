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
        // Create a mock for the SmsService interface
        $smsServiceMock = $this->createMock(SmsService::class);

        // Replace the bound instance with the mock
        $this->app->instance(SmsService::class, $smsServiceMock);

        // Call the endpoint or service that triggers the SMS sending
        $response = $this->post('/api/send-sms', [
            'phone' => '1234567890',
            'message' => 'Hello, World!',
        ]);

        // Assert that the sendSms method is called with the correct parameters
        $smsServiceMock->expects($this->once())
            ->method('sendSms') // Corrected method name
            ->with('1234567890', 'Hello, World!');

        // Resolve the bound instance directly from the container
        $resolvedInstance = resolve(SmsService::class);

        // Assert that the resolved instance is an instance of SmsService
        $this->assertInstanceOf(SmsService::class, $resolvedInstance);

        // Assert the response status
        $response->assertStatus(200);
    }
}
