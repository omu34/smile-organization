<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Conversation;
use App\Services\OpenAIService;
use Illuminate\Support\Facades\Auth;

class ChatBot extends Component
{
    public Conversation $conversation;
    public string $input = '';
    public array $messages = [];

    protected $listeners = [];

    public function mount(OpenAIService $ai)
    {
        $this->conversation = Conversation::firstOrCreate([
            'user_id' => Auth::id() ?? null
        ]);

        $this->loadMessages();

        // Dynamically register Echo listener for broadcasting (will be used client-side)
    }

    public function loadMessages()
    {
        $this->messages = $this->conversation->messages()->get()->map(function($m){
            return [
                'id' => $m->id,
                'role' => $m->role,
                'content' => $m->content,
                'meta' => $m->meta,
            ];
        })->toArray();
    }

    public function sendMessage(OpenAIService $ai)
    {
        if (trim($this->input) === '') return;

        $text = $this->input;
        $this->input = '';

        // Optimistic add user message
        $this->messages[] = ['role'=>'user','content'=>$text,'meta'=>null];

        // add assistant placeholder
        $this->messages[] = ['role'=>'assistant','content'=>'','meta'=>null];

        // call service (it will broadcast tokens)
        // You can optionally dispatch a job instead of direct call for non-blocking
        $ai->streamChat($this->conversation, $text);
    }

    public function appendToken($payload)
    {
        // update last assistant content locally when event comes back through Echo
        $lastIndex = count($this->messages) - 1;
        if ($lastIndex >= 0 && $this->messages[$lastIndex]['role'] === 'assistant') {
            $this->messages[$lastIndex]['content'] .= $payload['token'] ?? $payload['token'] ?? '';
            $this->dispatchBrowserEvent('ai-scroll-to-bottom');
        }
    }

    public function render()
    {
        return view('livewire.chat-bot');
    }
}
