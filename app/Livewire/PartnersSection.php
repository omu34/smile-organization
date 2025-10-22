<?php

namespace App\Livewire;

use App\Models\Partner;
use Livewire\Component;
use Livewire\Attributes\On;

class PartnersSection extends Component
{
    public $partners;

    #[On('partnerUpdated')]
    public function loadPartners()
    {
        $this->partners = Partner::where('is_featured', true)
            ->orderBy('id', 'desc')
            ->get();
    }


    #[On('echo:partners,PartnerUpdated')]
public function refreshPartners()
{
    $this->loadPartners();
}


    public function mount()
    {
        $this->loadPartners();
    }

    public function render()
    {
        return view('livewire.partners-section');
    }
}
