<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class AboutSection extends Component
{
    public $article;

    protected $listeners = [
        'echo:articles,ArticleUpdated' => 'refreshArticle',
    ];

    public function mount()
    {
        $this->article = Article::with('primaryMedia')->where('is_published', true)->first();
    }

    public function refreshArticle($payload)
    {
        $this->article = Article::with('primaryMedia')->find($payload['article']['id']);
    }

    // public function render()
    // {
    //     return view('livewire.about-section');
    // }

    public function render()
    {
        $article = Article::with('primaryMedia')->where('is_featured', true)->first();

        return view('livewire.about-section', [
            'article' => $article,
        ]);
    }
}

