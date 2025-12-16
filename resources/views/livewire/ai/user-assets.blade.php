<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-3">Your Recent AI Generations</h2>

    <ul class="space-y-3">
        @foreach ($assets as $asset)
            <li class="border rounded p-3 bg-gray-50">
                <div class="text-sm text-gray-500">{{ $asset->created_at->diffForHumans() }}</div>

                <div class="font-semibold">{{ ucfirst($asset->type) }}</div>
                <div class="text-gray-700">Prompt: {{ Str::limit($asset->prompt, 80) }}</div>

                @if($asset->type === 'text')
                    <p class="mt-2">{{ Str::limit($asset->result_text, 120) }}</p>
                @else
                    <img src="{{ $asset->image_url }}" class="mt-2 w-48 rounded shadow">
                @endif
            </li>
        @endforeach
    </ul>
</div>
