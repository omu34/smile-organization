<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ResourceItem;
use App\Models\PageSection;

class ResourceSection extends Component
{
    public $resources = [];
    public $mainTitle;
    public $mainDescription;

    protected $listeners = ['resourceUpdated' => '$refresh'];

    public function mount()
    {
        // $section = PageSection::where('section', 'resources')->first();

        $this->mainTitle = $section->title ?? 'Our Resources';
        $this->mainDescription = $section->description ?? 'Default description here...';

        $this->resources = ResourceItem::where('is_published', true)
            ->orderBy('position')
            ->get();
    }

    public function render()
    {
        return view('livewire.resource-section');
    }
}
