<div class="p-4 bg-white rounded shadow">
    <h3 class="text-lg font-semibold mb-3">Ask Anything</h3>

    <textarea wire:model.defer="prompt" rows="4" class="w-full p-2 border rounded" placeholder="Ask the AI..."></textarea>

    <div class="mt-2">
        <button wire:click="ask" class="px-4 py-2 bg-blue-600 text-white rounded" wire:loading.attr="disabled">Ask</button>
    </div>

    <div class="mt-4">
        @if($loading)
            <div>Thinking…</div>
        @endif

        @if($response)
            <div class="mt-2 p-3 bg-gray-50 border rounded whitespace-pre-wrap">{{ $response }}</div>
        @endif
    </div>
</div>
