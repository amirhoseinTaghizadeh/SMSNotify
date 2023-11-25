<?php

namespace App\Listeners;

use App\Contracs\SmsNotifierInterface;
use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeSms
{

    protected $smsNotifier;
    /**
     * Create the event listener.
     */
    public function __construct(SmsNotifierInterface $smsNotifier)
    {
        $this->smsNotifier = $smsNotifier;
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        $userId = $event->userId;
        $message = "welcome to holding";

        $phoneNumber = $event->userDetail->getUserPhoneNumber($userId);
        $event->smsNotifier->sendSms($phoneNumber, $message);
    }
}
