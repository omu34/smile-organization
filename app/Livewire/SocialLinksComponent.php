<?php

namespace App\Livewire;

use App\Models\SocialLink;
use Livewire\Component;

class SocialLinksComponent extends Component
{
    public $links = [];

    public function mount()
    {
        $this->loadLinks();
    }

    public function loadLinks()
    {
        $this->links = SocialLink::where('is_active', true)->orderBy('order')->get();
    }

    public function render()
    {
        return view('livewire.social-links-component', [
            'links' => $this->links,
        ]);
    }
}
