<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\NavigationLogoHeader;

class NavigationLogoHeaderComponent extends Component
{
    public ?string $logo = null;
    public ?string $link = null;

    public function mount(): void
    {
        // Fetch the first record
        $record = NavigationLogoHeader::first();

        // Use the accessor methods from your model
        if ($record) {
            $this->logo = $record->full_logo_url;
            $this->link = $record->full_link_url;
        }
    }

    public function render()
    {
        return view('livewire.navigation-logo-header-component');
    }
}

