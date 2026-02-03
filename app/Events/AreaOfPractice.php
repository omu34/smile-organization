<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AreaOfPractice
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

    public function __construct() {}

    public function broadcastOn()
    {
        // public channel – consider private channel if sensitive
        return ['area-of-practices'];
    }

    public function broadcastAs()
    {
        return 'AreaOfPracticeUpdated';
    }
}
