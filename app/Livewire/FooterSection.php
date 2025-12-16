<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FooterInfo;
use App\Models\FooterCta;
use App\Models\SocialLink;

class FooterSection extends Component
{
    public $footerInfo;
    public $footerCta;
    public $socialLinks;

    protected $listeners = ['footerUpdated' => 'loadFooterData'];

    public function mount()
    {
        $this->loadFooterData();
    }

    public function loadFooterData()
    {
        $this->footerInfo = FooterInfo::first();
        $this->footerCta = FooterCta::first();
        $this->socialLinks = SocialLink::where('is_active', true)
            ->orderBy('order')
            ->get();
    }

    public function getListeners()
    {
        return array_merge(
            $this->listeners,
            ['echo:footer,FooterUpdated' => 'refreshFooter']
        );
    }

    public function refreshFooter()
    {
        $this->loadFooterData();
    }

    public function render()
    {
        return view('livewire.footer-section', [
            'footerInfo' => $this->footerInfo,
            'footerCta' => $this->footerCta,
            'socialLinks' => $this->socialLinks,
        ]);
    }
}
