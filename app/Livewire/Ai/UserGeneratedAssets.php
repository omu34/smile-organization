<?php

namespace App\Livewire\Ai;

use Livewire\Component;
use App\Models\GeneratedAsset;

class UserGeneratedAssets extends Component
{
    public function render()
    {
        return view('livewire.ai.user-assets', [
            'assets' => GeneratedAsset::latest()->limit(10)->get(),
        ]);
    }
}
