<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\FeaturedArticle;

class FeaturedArticlesSection extends Component
{
    #[On('echo:featured-articles,FeaturedArticleUpdated')]
    public function refreshFeaturedArticles(): void
    {
        $this->dispatch('$refresh');
    }

    public function render()
    {
        $articles = FeaturedArticle::where('is_featured', true)->latest()->get();
        return view('livewire.featured-articles-section', compact('articles'));
    }
}
