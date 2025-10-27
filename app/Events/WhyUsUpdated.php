<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class WhyUsUpdated implements ShouldBroadcast
{
    public function broadcastOn(): Channel
    {
        return new Channel('why-us');
    }

    public function broadcastAs(): string
    {
        return 'whyus.updated';
    }
}
