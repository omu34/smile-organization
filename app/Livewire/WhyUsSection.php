<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\WhyUs;
use App\Events\WhyUsUpdated;
use App\Models\WhyUsItem;

class WhyUsSection extends Component
{
    public $whyUsItems = [];

    protected $listeners = ['whyus-updated' => 'loadItems'];

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


