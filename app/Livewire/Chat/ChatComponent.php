<?php

namespace App\Livewire\Chat;

use Livewire\Component;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class ChatComponent extends Component
{
    public ?Conversation $conversation = null;
    public ?string $message = '';
    public array $messages = [];

    public function mount(?Conversation $conversation = null)
    {
        $this->conversation = $conversation;
        if ($conversation) {
            $this->messages = $conversation->messages()->get()->map(fn($m)=>[
                'role'=>$m->role,'content'=>$m->content,'created_at'=>$m->created_at->toDateTimeString()
            ])->toArray();
        }
    }

    public function send()
    {
        $this->validate(['message'=>'required|string|min:1']);

        if (! Auth::check()) {
            $this->addError('message','You must be signed in to chat.');
            return;
        }

        // create conversation on the fly if none
        if (! $this->conversation) {
            $this->conversation = Conversation::create([
                'owner_type' => get_class(Auth::user())::getMorphClass(),
                'owner_id' => Auth::id(),
                'title' => 'Chat',
            ]);
        }

        $msg = Message::create([
            'conversation_id' => $this->conversation->id,
            'role'=>'user',
            'content'=>$this->message,
        ]);

        // append to local messages
        $this->messages[] = ['role'=>'user','content'=>$this->message,'created_at'=>now()->toDateTimeString()];

        // call SSE streaming endpoint in JS — Livewire will not stream directly.
        // we give the client the URL to open EventSource.
        $this->dispatchBrowserEvent('ai-stream-start', [
            'url' => route('ai.sse.stream', ['prompt' => $this->message, 'conversation_id'=>$this->conversation->id])
        ]);

        $this->message = '';
    }

    public function render()
    {
        return view('livewire.chat.chat-component');
    }
}
