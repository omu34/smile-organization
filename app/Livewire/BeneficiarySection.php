<?php

namespace App\Livewire;

use App\Models\Beneficiary;
use Livewire\Attributes\On;
use Livewire\Component;

class BeneficiarySection extends Component
{
    public $beneficiaries;

    #[On('echo:beneficiaries,BeneficiaryUpdated')]
    public function refreshBeneficiaries(): void
    {
        $this->loadBeneficiaries();
        $this->dispatch('$refresh');
    }

    public function mount()
    {
        $this->loadBeneficiaries();
    }

    protected function loadBeneficiaries(): void
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
