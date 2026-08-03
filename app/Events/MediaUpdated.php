<?php

namespace App\Events;

use App\Models\Gallery;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MediaUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $gallery;

    public $mediaUrl;

    public $action;

    /**
     * Create a new event instance.
     */
    public function __construct(Gallery $gallery, string $mediaUrl, string $action = 'updated')
    {
        $this->gallery = $gallery;
        $this->mediaUrl = $mediaUrl;
        $this->action = $action;
    }

    /**
     * Get the channels the event should broadcast on.
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('gallery'),
        ];
    }

    /**
     * The event's broadcast name.
     */
    public function broadcastAs(): string
    {
        return 'MediaUpdated';
    }
}
