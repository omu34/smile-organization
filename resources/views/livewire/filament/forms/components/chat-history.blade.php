@php
$conversation = $record;
$messages = $conversation->messages()->get();
@endphp

<div class="p-4 space-y-4 max-h-[60vh] overflow-auto">
    @foreach($messages as $m)
        <div class="{{ $m->role === 'user' ? 'text-right' : 'text-left' }}">
            <div class="inline-block p-3 rounded shadow {{ $m->role === 'user' ? 'bg-blue-600 text-white' : 'bg-white border' }}">
                @if(isset($m->meta['type']) && $m->meta['type'] === 'image')
                    <img src="{{ $m->meta['url'] }}" class="w-48 h-48 object-cover rounded" />
                @else
                    <div class="whitespace-pre-wrap">{{ $m->content }}</div>
                @endif
            </div>
            <div class="text-xs text-gray-400">{{ $m->created_at->diffForHumans() }}</div>
        </div>
    @endforeach
</div>
