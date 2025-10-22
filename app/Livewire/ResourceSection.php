<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ResourceItem;

class ResourceSection extends Component
{
    public $resources = [];

    protected $listeners = ['resourceUpdated' => '$refresh'];

    public function mount()
    {
        $this->resources = ResourceItem::where('is_published', true)
            ->orderBy('position')
            ->get();
    }

    public function render()
    {
        return view('livewire.resource-section');
    }
}
