<div class="fixed md:top-1 left-0 right-0 z-50 w-full bg-pink-300 mx-auto rounded-lg max-w-7xl h-16 border-b border-gray-200"
     x-data="{ openMenu: null, openedDropdown: null }">
    <div class="relative w-full flex items-center justify-center px-4 py-2">
        <div class="flex items-center justify-start space-x-4 py-1">
            <a href="{{ url('/') }}" class="">
                <img src="{{ asset('images/smile-logo.jpg') }}" class="rounded-full md:h-10 w-10 h-5 " alt="Logo" />
            </a>
        </div>

        <ul class="flex items-center justify-center p-1 space-x-1 list-none text-red-800 group">
            @foreach($menus as $menu)
                <li class="relative">
                    @if($menu->items && $menu->items->count())
                        <button
                            @mouseover="openMenu = '{{ $menu->slug }}';"
                            @mouseleave="openMenu = null"
                            class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors rounded-md hover:text-neutral-900 group w-max">
                            <span class="text-md md:text-lg">{{ $menu->name }}</span>
                            <svg :class="{'-rotate-180': openMenu === '{{ $menu->slug }}'}" class="relative top-[1px] ml-1 h-3 w-3 ease-out duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>

                        <div x-show="openMenu === '{{ $menu->slug }}'"
                             @mouseover="openMenu = '{{ $menu->slug }}'"
                             @mouseleave="openMenu = null"
                             x-cloak
                             x-transition
                             class="absolute left-1/2 transform -translate-x-1/2 translate-y-11 w-auto z-50">
                            <div class="bg-white border rounded-md shadow-sm border-neutral-200/70 p-4">
                                @foreach($menu->items as $item)
                                    @include('partials.nav-item', ['item' => $item])
                                @endforeach
                            </div>
                        </div>
                    {{-- @else
                        <a href="{{ $menu->slug === 'about-us' ? route('about') : url($menu->slug) }}" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors rounded-md hover:text-neutral-900">
                            {{ $menu->name }}
                        </a> --}}
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>

<script>
    // Livewire client-side hook to scroll (if you used section_id links)
    window.addEventListener('menus-refreshed', () => {
        // optional small pulse for UI when menus change
        console.debug('Menus refreshed');
    });
</script>
