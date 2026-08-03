<header class="sticky top-0 z-50 bg-white border-b border-gray-200 shadow-sm" x-data="{ mobileOpen: false, openMenu: null }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            {{-- Left: Logo --}}
            <div class="flex-shrink-0 flex items-center">
                <livewire:navigation-logo-header-component />
            </div>

            {{-- Center: Desktop menu --}}
            <nav class="hidden md:flex space-x-1 lg:space-x-4 items-center">
                @foreach ($menus as $menu)
                    @if ($menu->items && $menu->items->count())
                        @foreach ($menu->items as $item)
                            <div class="relative" x-data="{ open: false }" @mouseleave="open = false">
                                @if ($item->children->count())
                                    <button @mouseover="open = true" @focus="open = true"
                                        class="inline-flex items-center px-3 py-2 text-sm font-bold uppercase tracking-wider text-gray-900 hover:text-red-600 transition-colors focus:outline-none group">
                                        <span>{{ $item->title }}</span>
                                        <svg class="ml-1.5 h-3.5 w-3.5 transform transition-transform duration-200" :class="{ 'rotate-180': open }" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </button>

                                    <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-200"
                                        x-transition:enter-start="opacity-0 translate-y-1"
                                        x-transition:enter-end="opacity-100 translate-y-0"
                                        x-transition:leave="transition ease-in duration-150"
                                        x-transition:leave-start="opacity-100 translate-y-0"
                                        x-transition:leave-end="opacity-0 translate-y-1"
                                        class="absolute left-0 mt-1 w-56 bg-white border border-gray-200 rounded-xl shadow-2xl z-50 overflow-hidden py-2">
                                        <div class="flex flex-col">
                                            @foreach ($item->children->where('is_active', true) as $child)
                                                <a href="{{ $child->url ?? url($child->slug) }}" target="_blank"
                                                    class="px-4 py-2.5 text-xs font-bold uppercase tracking-wider text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors border-l-2 border-transparent hover:border-red-600">
                                                    {{ $child->title }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ $item->url ?? url($item->slug) }}" target="_blank"
                                        class="px-3 py-2 text-sm font-bold uppercase tracking-wider text-gray-900 hover:text-red-600 transition-colors">
                                        {{ $item->title }}
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </nav>

            {{-- Right: Mobile hamburger --}}
            <div class="md:hidden flex items-center">
                <button @click="mobileOpen = !mobileOpen"
                    class="inline-flex items-center justify-center p-2.5 rounded-lg text-gray-900 hover:text-red-600 hover:bg-gray-100 focus:outline-none transition-colors">
                    <svg x-show="!mobileOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                    </svg>
                    <svg x-show="mobileOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile panel --}}
    <div x-show="mobileOpen" x-cloak x-transition class="md:hidden bg-white border-t border-gray-200 shadow-xl">
        <div class="px-4 pt-3 pb-6 space-y-2">
            @foreach ($menus as $menu)
                @foreach ($menu->items as $item)
                    <div class="border-b border-gray-100 last:border-b-0 pb-2">
                        @if ($item->children->count())
                            <button @click="openMenu = openMenu === {{ $item->id }} ? null : {{ $item->id }}"
                                class="w-full flex items-center justify-between px-3 py-3 text-left text-sm font-bold uppercase tracking-wider text-gray-900 hover:text-red-600 transition-colors">
                                <span>{{ $item->title }}</span>
                                <svg class="h-4 w-4 transform transition-transform duration-200"
                                    :class="{ 'rotate-180': openMenu === {{ $item->id }} }" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2.5">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>

                            <div x-show="openMenu === {{ $item->id }}" x-cloak x-transition class="pl-4 py-2 space-y-1 bg-gray-50 rounded-lg mt-1">
                                @foreach ($item->children->where('is_active', true) as $child)
                                    <a href="{{ $child->url ?? url($child->slug) }}"
                                        class="block px-3 py-2 text-xs font-bold uppercase tracking-wider text-gray-700 hover:text-red-600 transition-colors">
                                        {{ $child->title }}
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <a href="{{ $item->url ?? url($item->slug) }}" target="_blank"
                                class="block px-3 py-3 text-sm font-bold uppercase tracking-wider text-gray-900 hover:text-red-600 transition-colors">
                                {{ $item->title }}
                            </a>
                        @endif
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>

    <script>
        window.addEventListener('menus-refreshed', () => {
            console.debug('Menus refreshed');
        });
    </script>
</header>