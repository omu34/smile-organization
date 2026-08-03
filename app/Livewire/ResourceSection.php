<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\ResourceItem;

class ResourceSection extends Component
{
    public $resources = [];
    public $mainTitle;
    public $mainDescription;

    #[On('echo:resource_items,ResourcesUpdated')]
    public function refreshResources(): void
    {
        $this->loadResources();
        $this->dispatch('$refresh');
    }

    public function mount()
    {
        $this->loadResources();
    }

    protected function loadResources(): void
    {
        $this->mainTitle = 'Our Resources';
        $this->mainDescription = 'Default description here...';

        $this->resources = ResourceItem::where('is_published', true)
            ->orderBy('position')
            ->get();
    }

    public function render()
    {
        return view('livewire.resource-section');
    }
}
