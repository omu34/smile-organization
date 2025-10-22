<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\{SocialLink,SiteContact};

class SocialsFooter extends Component
{
    public function render() {
        $links = SocialLink::where('is_active',true)->orderBy('order')->get();
        $contact = SiteContact::first();
        return view('livewire.socials-footer', compact('links','contact'));
    }
}
