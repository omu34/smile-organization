
<div>
    <div class="chat-box">
        @foreach($messages as $msg)
            <p><strong>{{ ucfirst($msg['role']) }}:</strong> {{ $msg['content'] }}</p>
        @endforeach
    </div>

    <input type="text" wire:model="input" placeholder="Type your message..." />
    <button wire:click="sendMessage">Send</button>
</div>
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('messageReceived', () => {
            const chatBox = document.querySelector('.chat-box');
            chatBox.scrollTop = chatBox.scrollHeight;
        });
    });
</script>
