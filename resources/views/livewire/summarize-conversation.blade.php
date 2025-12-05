<div class="p-4 bg-white rounded shadow">
    <h3 class="text-lg font-semibold mb-3">Summarize Conversation</h3>

    <div class="flex gap-2">
        <input wire:model.defer="conversationId" type="number" class="p-2 border rounded" placeholder="Conversation ID" />
        <button wire:click="summarize" class="px-3 py-2 bg-yellow-600 text-white rounded">Summarize</button>
    </div>

    @if($loading) <div class="mt-2">Summarizing…</div> @endif

    @if($summary)
        <div class="mt-4 p-3 bg-gray-50 border rounded whitespace-pre-wrap">{{ $summary }}</div>
    @endif
</div>
