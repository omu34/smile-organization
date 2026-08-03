<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 relative overflow-hidden">
    <!-- Top Accent Line -->
    <div class="absolute top-0 left-0 w-full h-1 bg-red-600"></div>

    <div class="space-y-4">
        <!-- Chat Log -->
        <div id="chat-log" class="space-y-4 max-h-[380px] overflow-y-auto p-4 bg-gray-50/70 rounded-xl border border-gray-100 scroll-smooth">
            @foreach($messages as $m)
                <div class="flex {{ $m['role'] === 'user' ? 'justify-end' : 'justify-start' }}">
                    <div class="max-w-[85%] px-4 py-3 rounded-2xl text-sm leading-relaxed shadow-sm {{ $m['role'] === 'user' ? 'bg-red-600 text-white rounded-tr-xs' : 'bg-white text-gray-900 border border-gray-200 rounded-tl-xs' }}">
                        {!! nl2br(e($m['content'])) !!}
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Input Form Area -->
        <div class="space-y-3">
            <textarea wire:model.defer="message" rows="3" 
                class="w-full rounded-xl border border-gray-200 focus:border-red-600 focus:ring-2 focus:ring-red-600/20 p-3.5 text-sm text-gray-900 outline-none transition-all placeholder:text-gray-400 resize-none" 
                placeholder="Type your message..."></textarea>
            
            @error('message') 
                <p class="text-xs font-semibold text-red-600">{{ $message }}</p> 
            @enderror

            <div class="flex items-center justify-between pt-1">
                <button wire:click="send" 
                    class="inline-flex items-center justify-center bg-red-600 hover:bg-red-700 text-white font-bold uppercase tracking-wider text-xs px-6 py-3 rounded-xl transition-all duration-300 shadow-md hover:shadow-red-900/30 focus:outline-none focus:ring-2 focus:ring-red-500" 
                    type="button">
                    Send Message
                    <svg class="w-3.5 h-3.5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"></path>
                    </svg>
                </button>
                
                <div id="streaming-indicator" class="text-xs font-bold text-red-600 animate-pulse hidden uppercase tracking-wider flex items-center space-x-1.5">
                    <span class="w-2 h-2 rounded-full bg-red-600 inline-block animate-ping"></span>
                    <span>AI is typing...</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('ai-stream-start', e => {
            const url = e.detail.url;
            const es = new EventSource(url);
            const chatLog = document.getElementById('chat-log');
            const indicator = document.getElementById('streaming-indicator');
            indicator.classList.remove('hidden');

            let assistantHtml = '<div class="flex justify-start"><div class="max-w-[85%] px-4 py-3 rounded-2xl rounded-tl-xs text-sm leading-relaxed bg-white text-gray-900 border border-gray-200 shadow-sm" id="assistant-stream"></div></div>';
            chatLog.insertAdjacentHTML('beforeend', assistantHtml);
            const assistantElem = document.getElementById('assistant-stream');
            
            es.onmessage = function(event) {
                if (!event.data) return;
                if (event.data.trim() === '[DONE]') {
                    es.close();
                    indicator.classList.add('hidden');
                    if (assistantElem) assistantElem.removeAttribute('id');
                    return;
                }

                try {
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
                if (assistantElem) assistantElem.removeAttribute('id');
            };
        });
    </script>
</div>