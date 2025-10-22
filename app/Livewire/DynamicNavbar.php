<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\NavigationMenu;
use Illuminate\Support\Facades\Cache;

class DynamicNavbar extends Component
{
    public $menus; // cached collection for rendering

    protected $listeners = [
        'menuUpdated' => 'refreshMenus',
        // optional: broadcasted event
        'echo:menus,MenuUpdated' => 'refreshMenusFromBroadcast',
    ];

    public function mount()
    {
        $this->refreshMenus();
    }

    public function refreshMenus()
    {
        $this->menus = Cache::remember('navigation_menus_active', 60, function () {
            return NavigationMenu::with(['items.children.children']) // eager for nested
                ->where('is_active', true)
                ->orderBy('order')
                ->get();
        });
    }

    // called when broadcast is received (if using Echo)
    public function refreshMenusFromBroadcast()
    {
        Cache::forget('navigation_menus_active');
        $this->refreshMenus();
        $this->dispatchBrowserEvent('menus-refreshed'); // optional UI hook
    }

    public function render()
    {
        return view('livewire.dynamic-navbar');
    }
}
