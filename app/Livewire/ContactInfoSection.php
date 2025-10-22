<?php

namespace App\Livewire;

use App\Models\ContactInfo;
use Livewire\Component;

class ContactInfoSection extends Component
{
    public function render()
    {
        $contact = ContactInfo::first();
        return view('livewire.contact-info-section', compact('contact'));
    }
}
