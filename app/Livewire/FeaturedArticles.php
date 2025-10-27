<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class FeaturedArticles extends Component
{
    public $count = 3;

    public function mount($count = 3)
    {
        $this->count = $count;
    }

    public function render()
    {
        $articles = Article::featured()->take($this->count)->with('media')->get();
        return view('livewire.featured-articles', compact('articles'));
    }
}

