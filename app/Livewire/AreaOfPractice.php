<?php

namespace App\Livewire;

use App\Models\AreaOfPractice as ModelsAreaOfPractice;
use App\Models\AreaTitle;
use Livewire\Component;

class AreaOfPractice extends Component
{
    public $areas_of_practices = [];
    public $areaTitle;

    public function mount()
    {
        $this->loadAreasOfPractices();
    }

    public function loadAreasOfPractices()
    {
        $this->areaTitle = AreaTitle::first();
        $this->areas_of_practices = ModelsAreaOfPractice::where('is_active', true)
            ->orderBy('order')
            ->get();
    }

    public function render()
    {
        return view('livewire.area-of-practice', [
            'areaTitle' => $this->areaTitle,
            'areas_of_practices' => $this->areas_of_practices,
        ]);
    }

}
