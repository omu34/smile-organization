<div class="p-4 bg-white rounded shadow">
    <h3 class="text-lg font-semibold mb-3">Generate Image</h3>

    <input wire:model.defer="prompt" type="text" class="w-full p-2 border rounded" placeholder="Describe the image you want..." />
    <div class="mt-2">
        <button wire:click="generate" class="px-4 py-2 bg-green-600 text-white rounded" wire:loading.attr="disabled">Generate</button>
    </div>

    <div class="mt-4">
        @if($loading) <div>Generating image…</div> @endif

        @if($imageUrl)
            <div class="mt-2">
                <img src="{{ $imageUrl }}" alt="AI image" class="max-w-full rounded shadow" />
            </div>
        @endif
    </div>
</div>
