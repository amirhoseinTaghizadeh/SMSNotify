<?php

namespace App\Events;

use App\Contracs\SmsNotifierInterface;
use App\Contracts\UserDetailInterface;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserRegistered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userId;
    public $smsNotifier;
    public $userDetail;

    /**
     * Create a new event instance.
     */
    public function __construct($userId, SmsNotifierInterface $smsNotifier, UserDetailInterface $userDetail)
    {
        $this->userId = $userId;
        $this->smsNotifier = $smsNotifier;
        $this->userDetail = $userDetail;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
