<?php
namespace App\Events;

use App\Models\Article;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class ArticleUpdated implements ShouldBroadcastNow
{
    public $article;

    public function __construct(Article $article)
    {
        $this->article = $article->load('media');
    }

    public function broadcastOn(): Channel
    {
        return new Channel('articles');
    }

    public function broadcastAs(): string
    {
        return 'ArticleUpdated';
    }
}
