<?php

namespace App\Livewire;

use App\Models\SiteContact;
use Livewire\Component;

class FooterContactSection extends Component
{
    public function render()
    {
        $site = SiteContact::first();
        return view('livewire.footer-contact-section', compact('site'));
    }
}
