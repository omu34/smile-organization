<?php
namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class StreamTokenReceived implements ShouldBroadcastNow
{
    use InteractsWithSockets;

    public int $conversationId;
    public string $token;

    public function __construct(int $conversationId, string $token)
    {
        $this->conversationId = $conversationId;
        $this->token = $token;
    }

    public function broadcastOn(): array
    {
        return [ new Channel('conversation.' . $this->conversationId) ];
    }

    public function broadcastWith(): array
    {
        return ['token' => $this->token];
    }
}
