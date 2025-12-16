<div class="p-4 bg-white rounded shadow">
    <div class="space-y-2">
        <div id="chat-log" class="space-y-3 max-h-72 overflow-auto p-2 bg-gray-50 rounded">
            @foreach($messages as $m)
                <div class="p-2 {{ $m['role'] === 'user' ? 'text-right' : 'text-left' }}">
                    <div class="inline-block px-3 py-2 rounded {{ $m['role'] === 'user' ? 'bg-blue-100' : 'bg-gray-100' }}">
                        {!! nl2br(e($m['content'])) !!}
                    </div>
                </div>
            @endforeach
        </div>

        <textarea wire:model.defer="message" rows="3" class="w-full border rounded p-2" placeholder="Say something..."></textarea>
        @error('message') <p class="text-sm text-red-600">{{ $message }}</p> @enderror

        <div class="flex items-center gap-3">
            <button wire:click="send" class="px-4 py-2 bg-indigo-600 text-white rounded" type="button">Send</button>
            <div id="streaming-indicator" class="text-sm text-gray-500 hidden">Streaming...</div>
        </div>
    </div>

    <script>
        window.addEventListener('ai-stream-start', e => {
            const url = e.detail.url;
            const es = new EventSource(url);
            const chatLog = document.getElementById('chat-log');
            const indicator = document.getElementById('streaming-indicator');
            indicator.classList.remove('hidden');

            let assistantHtml = '<div class="p-2 text-left"><div class="inline-block px-3 py-2 rounded bg-gray-100" id="assistant-stream"></div></div>';
            chatLog.insertAdjacentHTML('beforeend', assistantHtml);
            const assistantElem = document.getElementById('assistant-stream');
            es.onmessage = function(event) {
                // OpenAI streaming sends "data: {json}" lines; some servers send "data: [DONE]"
                if (! event.data) return;
                if (event.data.trim() === '[DONE]') {
                    es.close();
                    indicator.classList.add('hidden');
                    return;
                }

                try {
                    // Many servers send each chunk as a JSON object, or raw text.
                    let parsed;
                    try { parsed = JSON.parse(event.data); } catch (err) { parsed = { chunk: event.data }; }
                    if (parsed.choices && parsed.choices.length) {
                        const delta = parsed.choices[0].delta?.content ?? parsed.choices[0].text ?? '';
                        assistantElem.innerHTML += delta;
                    } else if (parsed.chunk) {
                        assistantElem.innerHTML += parsed.chunk;
                    } else {
                        assistantElem.innerHTML += event.data;
                    }
                    chatLog.scrollTop = chatLog.scrollHeight;
                } catch (err) {
                    console.error('Stream parse err', err);
                }
            };

            es.onerror = function(err) {
                console.error('SSE error', err);
                es.close();
                indicator.classList.add('hidden');
            };
        });
    </script>
</div>
