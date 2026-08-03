<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FeaturedArticleUpdated implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public function broadcastOn(): Channel
    {
        return new Channel('featured-articles');
    }

    public function broadcastAs(): string
    {
        return 'FeaturedArticleUpdated';
    }
}
