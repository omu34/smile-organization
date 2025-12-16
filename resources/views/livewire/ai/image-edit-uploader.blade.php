<div class="p-4 bg-white rounded shadow">
    <h3 class="font-semibold mb-2">Upload & Edit Image (Image->Image)</h3>

    @if (session()->has('message'))
        <div class="p-2 bg-green-100 rounded mb-2">{{ session('message') }}</div>
    @endif

    <div>
        <input type="file" wire:model="image" accept="image/*">
        @error('image') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div class="mt-2">
        <textarea wire:model.defer="prompt" rows="3" class="w-full border p-2 rounded" placeholder="Describe the edit..."></textarea>
        @error('prompt') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div class="mt-2">
        <button wire:click="submit" class="px-4 py-2 bg-emerald-600 text-white rounded" wire:loading.attr="disabled">Submit for Edit</button>
        <span wire:loading class="text-sm text-gray-500">Uploading…</span>
    </div>
</div>
{{-- @if ($editedImageUrl)
    <div class="mt-4 p-4 bg-gray-50 rounded shadow">
        <h4 class="font-semibold mb-2">Edited Image:</h4>
        <img src="{{ $editedImageUrl }}" alt="Edited Image" class="max-w-full rounded shadow">
        <div class="mt-2">
            <a href="{{ $editedImageUrl }}" download class="px-4 py-2 bg-blue-600 text-white rounded">Download Edited Image</a>
        </div>
    </div>
@endif --}}
