<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Beneficiary;

class BeneficiarySection extends Component
{
    public $beneficiaries;

    protected $listeners = ['beneficiaryUpdated' => '$refresh'];

    public function mount()
    {
        $this->beneficiaries = Beneficiary::where('is_published', true)
            ->latest('published_at')
            ->get();
    }

    public function render()
    {
        return view('livewire.beneficiary-section');
    }
}
