<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Hello implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
//    public $user;

    public function __construct($message)
    {
        $this->message = $message;
//        $this->user = $user;
    }

    public function broadcastOn()
    {
        return ['messages-channel'];
    }

    public function broadcastAs()
    {
        return 'messages-event';
    }
}
