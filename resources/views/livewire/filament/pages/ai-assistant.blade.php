<x-filament-panels::page>

    {{-- <x-filament::page> --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Chat -->
        <div class="p-4 border rounded bg-white">
            <h2 class="text-lg font-semibold mb-2">Ask Anything (Chat)</h2>
            <livewire:ask-anything />
        </div>

        <!-- Image -->
        <div class="p-4 border rounded bg-white">
            <h2 class="text-lg font-semibold mb-2">Generate Image</h2>

            <form wire:submit.prevent="generateImage">
                <div class="mb-2">
                    <label class="text-sm">Prompt</label>
                    <textarea class="w-full border rounded p-2" rows="3" wire:model.defer="prompt"
                        placeholder="A futuristic city skyline at sunset..."></textarea>
                </div>
                <div class="mb-2">
                    <label class="text-sm">Size</label>
                    <select class="border rounded px-2 py-1" wire:model="size">
                        <option>512x512</option>
                        <option selected>1024x1024</option>
                        <option>2048x2048</option>
                    </select>
                </div>
                <button type="submit" class="bg-emerald-600 text-white px-3 py-2 rounded">Generate</button>
            </form>

            @if ($imageUrl)
                <div class="mt-4">
                    <img src="{{ $imageUrl }}" class="rounded border" alt="Generated imagev">
                </div>
                {{-- </x-filament::page> --}}
            @endif
        </div>
    </div>
</x-filament-panels::page>
