<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class GalleryUpdated implements ShouldBroadcast
{
    use SerializesModels;

    public function broadcastOn()
    {
        return new Channel('gallery');
    }

    public function broadcastAs()
    {
        return 'GalleryUpdated';
    }
}
