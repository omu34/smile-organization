<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\NavigationMenu;
use Illuminate\Support\Facades\Cache;

class DynamicNavbar extends Component
{
    public $menus; // cached collection for rendering

    protected $listeners = [
        'menuUpdated' => 'refreshMenus',
        'echo:menus,MenuUpdated' => 'refreshMenusFromBroadcast',
    ];




    #[On('menuUpdated')]
    public function mount()
    {
        $this->refreshMenus();
    }


    public function refreshMenus()
    {

        // $this->refresh();
        $this->menus = Cache::remember('navigation_menus_active', 60, function () {
            return NavigationMenu::with(['items.children.children'])
                ->where('is_active', true)
                ->orderBy('order')
                ->get();
        });
    }

    public function refreshMenusFromBroadcast()
    {
        Cache::forget('navigation_menus_active');
        $this->refreshMenus();
        $this->dispatch('menus-refreshed');
    }

    public function render()
    {
        return view('livewire.dynamic-navbar');
    }
}
