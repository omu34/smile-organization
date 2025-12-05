<?php
namespace App\Jobs;

use App\Models\Conversation;
use App\Services\OpenAIService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class StreamConversationJob implements ShouldQueue
{
    use Dispatchable, Queueable;

    public int $conversationId;
    public string $userMessage;
    public function __construct(int $conversationId, string $userMessage)
    {
        $this->conversationId = $conversationId;
        $this->userMessage = $userMessage;
    }

    public function handle(OpenAIService $ai)
    {
        $conversation = Conversation::find($this->conversationId);
        if (!$conversation) return;
        $ai->streamChat($conversation, $this->userMessage);
    }
}
