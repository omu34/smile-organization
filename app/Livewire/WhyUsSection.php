<?php

namespace App\Livewire;

use App\Models\WhyUsItem;
use Livewire\Attributes\On;
use Livewire\Component;

class WhyUsSection extends Component
{
    public $whyUsItems = [];

    #[On('echo:why-us,whyus.updated')]
    public function refreshWhyUs(): void
    {
        $this->loadItems();
        $this->dispatch('$refresh');
    }

    public function mount()
    {
        $this->loadItems();
    }

    public function loadItems()
    {
        $this->whyUsItems = WhyUsItem::all();
    }

    public function render()
    {
        return view('livewire.why-us-section');
    }
}


