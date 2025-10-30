<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class AboutUs extends Component
{
    public $article;

    public function mount()
    {
        $this->article = Article::with('primaryMedia')->first(); // Only one About Us article
    }

    public function render()
    {
        return view('livewire.about-us');
    }
}


