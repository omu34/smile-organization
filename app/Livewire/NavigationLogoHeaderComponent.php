<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\NavigationLogoHeader;

class NavigationLogoHeaderComponent extends Component
{
    public $logo;
    public $link;

    public function mount(): void
    {
        $record = NavigationLogoHeader::first();

        if ($record) {
            $this->logo = $record->logo_url ?? $record->logo;
            $this->link = $record->link;
        }
    }

    public function render()
    {
        return view('livewire.navigation-logo-header-component');
    }
}
