<footer class="bg-gray-900 text-white py-12 px-6 md:px-16">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

        {{-- Footer Info Section --}}
        <div>
            @if ($footerInfo)
                <h2 class="text-xl font-semibold mb-4">{{ $footerInfo->title ?? 'About Us' }}</h2>
                <p class="text-gray-400 leading-relaxed">{{ $footerInfo->description ?? '' }}</p>

                <div class="mt-4 space-y-1 text-gray-400">
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
                <p class="text-gray-500">Footer info not available.</p>
            @endif
        </div>

        {{-- Call To Action Section --}}
        <div class="flex flex-col justify-center items-center bg-gray-800 rounded-xl p-6 text-center">
            @if ($footerCta)
                <h3 class="text-lg font-semibold mb-2">{{ $footerCta->title ?? 'Stay Connected' }}</h3>
                <p class="text-gray-400 mb-4">{{ $footerCta->subtitle ?? 'Join our newsletter for updates.' }}</p>

                @if ($footerCta->button_text && $footerCta->button_link)
                    <a href="{{ $footerCta->button_link }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition">
                        {{ $footerCta->button_text }}
                    </a>
                @endif
            @else
                <p class="text-gray-500">CTA not configured.</p>
            @endif
        </div>

        {{-- Social Links Section --}}
        <div>
            <h2 class="text-xl font-semibold mb-4">Follow Us</h2>
            <div wire:poll.30s="loadFooterData" class="flex space-x-4">
                @forelse ($socialLinks as $link)
                    <a href="{{ $link->url }}"
                       target="_blank"
                       title="{{ $link->platform_name }}"
                       class="hover:opacity-80 transition-transform transform hover:scale-110">
                        @if ($link->image_path)
                            {{-- <img src="{{ asset('storage/' . $link->image_path) }}"
                                 alt="{{ $link->platform_name }}" --}}
                                 <img src="{{ asset('storage/' . $link->image_path) }}" alt="{{ $link->title }}"
                                 class="w-8 h-8 object-contain rounded-md">
                        @else
                            <div class="w-8 h-8 bg-gray-700 rounded-md flex items-center justify-center">
                                <span class="text-xs text-gray-400">{{ substr($link->platform_name, 0, 1) }}</span>
                            </div>
                        @endif
                    </a>
                @empty
                    <p class="text-gray-400">No social links available.</p>
                @endforelse
            </div>
        </div>

    </div>

    {{-- Footer Bottom --}}
    <div class="text-center mt-12 text-gray-500 border-t border-gray-700 pt-6">
        <p>&copy; {{ date('Y') }} {{ $footerInfo->company_name ?? 'Your Company' }}. All rights reserved.</p>
    </div>
</footer>
