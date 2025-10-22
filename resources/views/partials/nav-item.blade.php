@php
    $hasChildren = $item->children && $item->children->count();
@endphp

<div class="group">
    <a
        href="{{ $item->href ?? ('#' . $item->section_id) }}"
        class="block px-4 py-3 hover:bg-pink-50 rounded">
        <div class="flex justify-between items-center">
            <div>
                <div class="font-semibold text-red-900">{{ $item->label }}</div>
                @if($item->description)
                    <p class="text-xs text-gray-500">{{ $item->description }}</p>
                @endif
            </div>
            @if($hasChildren)
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            @endif
        </div>
    </a>

    @if($hasChildren)
        <div class="ml-4 border-l pl-2">
            @foreach($item->children as $child)
                @include('partials.nav-item', ['item' => $child])
            @endforeach
        </div>
    @endif
</div>
