<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Activity;

class ActivitiesSection extends Component
{
    protected $listeners = ['activityUpdated' => '$refresh'];

    public function render()
    {
        $activities = Activity::where('is_visible', true)->orderBy('order')->get();
        return view('livewire.activities-section', compact('activities'));
    }
}
