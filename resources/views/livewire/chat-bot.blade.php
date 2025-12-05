<div class="flex flex-col h-[80vh] bg-gray-50 border rounded">
  <div id="chat-container" class="flex-1 overflow-auto p-4 space-y-3">
    @foreach($messages as $msg)
      <div class="flex {{ $msg['role'] === 'user' ? 'justify-end' : 'justify-start' }}">
        <div class="{{ $msg['role'] === 'user' ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 border' }} p-3 rounded-lg max-w-2xl">
          @if(isset($msg['meta']['type']) && $msg['meta']['type'] === 'image' && isset($msg['meta']['url']))
            <img src="{{ $msg['meta']['url'] }}" alt="generated" class="w-64 h-64 object-cover rounded" />
          @else
            <div class="whitespace-pre-wrap">{!! \Illuminate\Mail\Markdown::parse($msg['content']) !!}</div>
          @endif
        </div>
      </div>
    @endforeach
  </div>

  <div class="p-3 border-t bg-white">
    <form wire:submit.prevent="sendMessage" class="flex gap-2">
      <input wire:model.defer="input" type="text" placeholder="Ask AI to generate a follow-up email, summarize, or create an image..." class="flex-1 border rounded px-3 py-2" />
      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Send</button>
    </form>
  </div>
</div>

<script>
  document.addEventListener('livewire:load', function () {
    // register Echo channel listener for conversation.{id}
    const conversationId = @json($conversation->id);
    // Use Laravel Echo configured in your resources/js/bootstrap
    if (window.Echo && conversationId) {
      Echo.channel('conversation.'+conversationId)
        .listen('StreamTokenReceived', (e) => {
          // forward to Livewire via emit
          Livewire.emit('appendToken', { token: e.token });
        });
    }

    // scroll helper
    window.addEventListener('ai-scroll-to-bottom', () => {
      const c = document.getElementById('chat-container');
      if (c) c.scrollTop = c.scrollHeight;
    });
  });
</script>
