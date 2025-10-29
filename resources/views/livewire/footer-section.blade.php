<footer class="bg-white text-black py-12 px-6 md:px-16 shadow-md shadow-emerald-200">
    <div class=" mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

        {{-- Footer Info Section --}}
        <div class="space-y-4 text-center sm:text-left">
            @if ($footerInfo)

            <livewire:navigation-logo-header-component />
                {{-- <h2 class="text-xl font-bold">{{ $footerInfo->title ?? 'About Us' }}</h2> --}}
                <p class="leading-relaxed text-gray-700">
                    {{ $footerInfo->description ?? '' }}
                </p>

                <div class="mt-4 space-y-2 text-gray-700">
                    @if ($footerInfo->address)
                        <p><strong>Address:</strong> {{ $footerInfo->address }}</p>
                    @endif
                    @if ($footerInfo->phone)
                        <p><strong>Phone:</strong> {{ $footerInfo->phone }}</p>
                    @endif
                    @if ($footerInfo->email)
                        <p><strong>Email:</strong> {{ $footerInfo->email }}</p>
                    @endif
                </div>
            @else
                <p>Footer info not available.</p>
            @endif
        </div>

        {{-- Call To Action Section --}}
        <div class="bg-black text-white rounded-xl p-6 text-center flex flex-col items-center justify-center">
            @if ($footerCta)
                <h3 class="text-lg font-semibold mb-2">{{ $footerCta->title ?? 'Stay Connected' }}</h3>
                <p class="mb-4 text-gray-300">{{ $footerCta->subtitle ?? 'Join our newsletter for updates.' }}</p>

                @if ($footerCta->button_text && $footerCta->button_link)
                    <a href="{{ $footerCta->button_link }}"
                       class="bg-white text-black px-6 py-2 rounded-lg font-medium hover:bg-gray-700 hover:text-white transition duration-200">
                        {{ $footerCta->button_text }}
                    </a>
                @endif
            @else
                <p>CTA not configured.</p>
            @endif
        </div>

        {{-- Social Links Section --}}
        <div class="space-y-4 text-center sm:text-left">
            <h2 class="text-xl font-semibold">Follow Us</h2>
            <div wire:poll.30s="loadFooterData"
                 class="flex flex-wrap justify-center sm:justify-start gap-4">
                @forelse ($socialLinks as $link)
                    <a href="{{ $link->url }}"
                       target="_blank"
                       title="{{ $link->platform_name }}"
                       class="transition-transform hover:scale-110">
                        @if ($link->image_path)
                            <img src="{{ asset('storage/' . $link->image_path) }}"
                                 alt="{{ $link->platform_name }}"
                                 class="w-8 h-8 object-contain rounded-md">
                        @else
                            <div class="w-8 h-8 bg-black rounded-md flex items-center justify-center">
                                <span class="text-xs text-white font-semibold">
                                    {{ strtoupper(substr($link->platform_name, 0, 1)) }}
                                </span>
                            </div>
                        @endif
                    </a>
                @empty
                    <p>No social links available.</p>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Footer Bottom --}}
    <div class="text-center mt-12 text-sm text-gray-700 border-t border-gray-300 pt-6">
        <p>&copy; {{ date('Y') }} {{ $footerInfo->company_name ?? 'Your Company' }}. All rights reserved.</p>
    </div>
</footer>

