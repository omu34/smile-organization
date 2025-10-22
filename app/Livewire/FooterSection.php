<?php 
namespace App\Livewire;

use Livewire\Component;
use App\Models\SocialLink;
use App\Models\FooterInfo;
use App\Models\FooterCta;

class FooterSection extends Component
{
    public $socialLinks = [];
    public $footerInfo;
    public $ctas = [];

    protected $listeners = ['socialLinkUpdated' => '$refresh', 'footerInfoUpdated' => '$refresh', 'footerCtaUpdated' => '$refresh'];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->socialLinks = SocialLink::where('is_active', true)->get();
        $this->footerInfo = FooterInfo::first();
        $this->ctas = FooterCta::where('is_active', true)->get();
    }

    public function render()
    {
        return view('livewire.footer-section');
    }
}
