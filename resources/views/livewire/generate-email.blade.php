<div class="p-4 bg-white rounded shadow">
    <h3 class="text-lg font-semibold mb-3">Generate Email</h3>

    <input wire:model.defer="subject" type="text" class="w-full p-2 border rounded mb-2" placeholder="Subject" />
    <input wire:model.defer="audience" type="text" class="w-full p-2 border rounded mb-2" placeholder="Audience (e.g., team, client)" />
    <select wire:model.defer="tone" class="w-full p-2 border rounded mb-2">
        <option value="professional">Professional</option>
        <option value="casual">Casual</option>
        <option value="friendly">Friendly</option>
    </select>

    <div>
        <button wire:click="generate" class="px-4 py-2 bg-indigo-600 text-white rounded" wire:loading.attr="disabled">Generate Email</button>
    </div>

    @if($body)
        <div class="mt-4 p-3 bg-gray-50 border rounded whitespace-pre-wrap">{{ $body }}</div>
    @endif
</div>
