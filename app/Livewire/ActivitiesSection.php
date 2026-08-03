<?php

namespace App\Livewire;

use App\Models\Activity;
use Livewire\Attributes\On;
use Livewire\Component;

class ActivitiesSection extends Component
{
    public array $activities = [];

    #[On('echo:activities,ActivityUpdated')]
    public function refreshActivities(): void
    {
        $this->loadActivities();
        $this->dispatch('$refresh');
    }

    public function mount(): void
    {
        $this->loadActivities();
    }

    public function loadActivities(): void
    {
        $this->activities = Activity::where('is_visible', true)
            ->orderBy('order')
            ->get()
            ->all();
    }

    public function render()
    {
        return view('livewire.activities-section', [
            'activities' => $this->activities,
        ]);
    }
}
