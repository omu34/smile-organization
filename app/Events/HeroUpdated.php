<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Hero;

class HeroUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $hero;

    public function __construct(Hero $hero)
    {
        $this->hero = $hero;
    }

    public function broadcastOn(): array
    {
        return ['hero'];
    }

    public function broadcastAs(): string
    {
        return 'HeroUpdated';
    }
}
