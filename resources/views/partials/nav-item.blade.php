@php
    $hasChildren = $item->children && $item->children->count();
@endphp

<div class="group">
    <a
        href="{{ $item->href ?? ('#' . $item->section_id) }}"
        class="block px-4 py-3 hover:bg-red-50/60 rounded-xl transition-all duration-200">
        <div class="flex justify-between items-center">
            <div>
                <div class="font-bold text-gray-900 group-hover:text-red-600 transition-colors">
                    {{ $item->label }}
                </div>
                @if($item->description)
                    <p class="text-xs text-gray-500 mt-0.5 font-normal">
                        {{ $item->description }}
                    </p>
                @endif
            </div>
            @if($hasChildren)
                <svg class="w-4 h-4 ml-2 text-gray-400 group-hover:text-red-600 transition-colors" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            @endif
        </div>
    </a>

    @if($hasChildren)
        <div class="ml-4 pl-3 border-l-2 border-gray-100 space-y-1 my-2">
            @foreach($item->children as $child)
                @include('partials.nav-item', ['item' => $child])
            @endforeach
        </div>
    @endif
</div>