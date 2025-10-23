<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class VideoUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $videoUrl;

    public function __construct(string $videoUrl)
    {
        $this->videoUrl = $videoUrl;
    }

    public function broadcastOn()
    {
        return ['videos'];
    }

    public function broadcastAs()
    {
        return 'VideoUpdated';
    }
}
