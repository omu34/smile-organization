<div class="sticky top-0 z-50 bg-white border-b" x-data="{ mobileOpen: false, openMenu: null }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            {{-- Left: Logo --}}
            <div class="flex-shrink-0">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/smile-logo.jpg') }}" alt="Logo"
                        class="h-10 w-10 rounded-full object-cover">
                </a>
            </div>

            {{-- Center: Desktop menu --}}
            <nav class="hidden md:flex space-x-2 items-center">
                @foreach ($menus as $menu)
                    {{-- each menu (we assume one main menu) --}}
                    @if ($menu->items && $menu->items->count())
                        @foreach ($menu->items as $item)
                            <div class="relative" x-data="{ open: false }" @mouseleave="open = false">
                                @if ($item->children->count())
                                    <button @mouseover="open = true" @focus="open = true"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none">
                                        <span>{{ $item->title }}</span>
                                        <svg class="ml-1 h-3 w-3" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </button>

                                    <div x-show="open" x-cloak x-transition
                                        class="absolute left-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-50">
                                        <div class="py-2">
                                            @foreach ($item->children->where('is_active', true) as $child)
                                                <a href="{{ $child->url ?? url($child->slug) }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                                    {{ $child->title }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ $item->url ?? url($item->slug) }}"
                                        class="px-4 py-2 text-sm text-gray-700 hover:text-gray-900">
                                        {{ $item->title }}
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </nav>

            {{-- Right: Mobile hamburger --}}
            <div class="md:hidden">
                <button @click="mobileOpen = !mobileOpen"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-gray-900 focus:outline-none">
                    <svg x-show="!mobileOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                    </svg>
                    <svg x-show="mobileOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile panel --}}
    <div x-show="mobileOpen" x-cloak x-transition class="md:hidden bg-white border-t">
        <div class="px-2 pt-2 pb-3 space-y-1">
            @foreach ($menus as $menu)
                @foreach ($menu->items as $item)
                    <div>
                        @if ($item->children->count())
                            <button @click="openMenu = openMenu === {{ $item->id }} ? null : {{ $item->id }}"
                                class="w-full flex items-center justify-between px-4 py-2 text-left text-gray-700 hover:bg-gray-50">
                                <span>{{ $item->title }}</span>
                                <svg class="h-4 w-4 transform"
                                    :class="{ 'rotate-180': openMenu === {{ $item->id }} }" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>

                            <div x-show="openMenu === {{ $item->id }}" x-cloak class="pl-6">
                                @foreach ($item->children->where('is_active', true) as $child)
                                    <a href="{{ $child->url ?? url($child->slug) }}"
                                        class="block px-4 py-2 text-gray-600 hover:bg-gray-50">
                                        {{ $child->title }}
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <a href="{{ $menu->slug === 'about' ? route('about') : url($menu->slug) }}"
                                class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors rounded-md hover:text-neutral-900">
                                {{ $menu->name }}
                            </a>
                        @endif

                    </div>
                @endforeach
            @endforeach
        </div>
    </div>

    <script>
        window.addEventListener('menus-refreshed', () => {
            // optional: small toast or console
            console.debug('Menus refreshed');
        });
    </script>
</div>
