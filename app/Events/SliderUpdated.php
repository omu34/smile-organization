<?php

namespace App\Events;

use App\Models\Slider;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class SliderUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sliderSlug;

    public function __construct(Slider $slider)
    {
        $this->sliderSlug = $slider->slug;
    }

    public function broadcastOn()
    {
        return new Channel('slider.' . $this->sliderSlug);
    }

    public function broadcastAs()
    {
        return 'slider.updated';
    }
}

