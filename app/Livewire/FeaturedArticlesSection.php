<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FeaturedArticle;

class FeaturedArticlesSection extends Component
{
    public function render()
    {
        $articles = FeaturedArticle::where('is_featured', true)->latest()->get();
        return view('livewire.featured-articles-section', compact('articles'));
    }
}
