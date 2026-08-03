<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Article;

class AboutUs extends Component
{
    public $article;

    #[On('echo:articles,ArticleUpdated')]
    public function refreshAbout(): void
    {
        $this->article = Article::with('primaryMedia')->first();
        $this->dispatch('$refresh');
    }

    public function mount()
    {
        $this->article = Article::with('primaryMedia')->first(); // Only one About Us article
    }

    public function render()
    {
        return view('livewire.about-us');
    }
}


