<footer class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200 border-t border-gray-200 dark:border-gray-700 shadow-sm shadow-emerald-100/50 dark:shadow-emerald-900/20">
    <div class=" mx-auto px-6 sm:px-10  py-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 md:gap-14">

        {{-- Footer Info Section --}}
        <div class="space-y-5 text-center sm:text-left">
            @if ($footerInfo)
                <div class="flex justify-center sm:justify-start">
                    <livewire:navigation-logo-header-component />
                </div>

                <p class="leading-relaxed font-bold text-gray-700 dark:text-gray-300 text-base md:text-[15px]">
                    {{ $footerInfo->description ?? '' }}
                </p>

                <div class="space-y-1 text-gray-600  dark:text-gray-400 text-sm md:text-[14px]">
                    @if ($footerInfo->address)
                        <p><span class="font-bold text-gray-800 dark:text-gray-200">Address:</span> {{ $footerInfo->address }}</p>
                    @endif
                    @if ($footerInfo->phone)
                        <p><span class="font-bold text-gray-800 dark:text-gray-200">Phone:</span> {{ $footerInfo->phone }}</p>
                    @endif
                    @if ($footerInfo->email)
                        <p><span class="font-bold text-gray-800 dark:text-gray-200">Email:</span> {{ $footerInfo->email }}</p>
                    @endif
                </div>
            @else
                <p class="text-gray-500 dark:text-gray-400">Footer info not available.</p>
            @endif
        </div>

        {{-- Call To Action Section --}}
        <div class="bg-black dark:bg-emerald-700 text-white rounded-2xl p-8 flex flex-col items-center justify-center text-center shadow-inner shadow-emerald-900/30 hover:shadow-emerald-600/40 transition duration-300">
            @if ($footerCta)
                <h3 class="text-xl md:text-2xl font-bold mb-2 tracking-tight">
                    {{ $footerCta->title ?? 'Stay Connected' }}
                </h3>
                <p class="mb-5 text-gray-300 dark:text-gray-100/90 max-w-sm leading-relaxed">
                    {{ $footerCta->subtitle ?? 'Join our newsletter for updates.' }}
                </p>

                @if ($footerCta->button_text && $footerCta->button_link)
                    <a href="{{ $footerCta->button_link }}"
                       class="bg-white dark:bg-gray-900 text-black dark:text-white px-6 py-2.5 rounded-lg font-medium hover:bg-emerald-600 hover:text-white transition-all duration-300 shadow-md hover:shadow-lg">
                        {{ $footerCta->button_text }}
                    </a>
                @endif
            @else
                <p class="text-gray-400 dark:text-gray-200">CTA not configured.</p>
            @endif
        </div>

        {{-- Social Links Section --}}
        <div class="space-y-5 text-center sm:text-left">
            <h2 class="text-xl font-bold tracking-tight text-gray-900 dark:text-gray-100">Follow Us</h2>
            <div wire:poll.30s="loadFooterData"
                 class="flex flex-wrap justify-center sm:justify-start gap-4">
                @forelse ($socialLinks as $link)
                    <a href="{{ $link->url }}"
                       target="_blank"
                       title="{{ $link->platform_name }}"
                       class="transition-transform hover:scale-110 hover:opacity-90">
                        @if ($link->image_path)
                            <img src="{{ asset('storage/' . $link->image_path) }}"
                                 alt="{{ $link->platform_name }}"
                                 class="w-9 h-9 object-contain rounded-md shadow-sm hover:shadow-md transition-all duration-300">
                        @else
                            <div class="w-9 h-9 bg-black dark:bg-gray-800 rounded-md flex items-center justify-center shadow-sm hover:shadow-md transition-all duration-300">
                                <span class="text-sm text-white font-bold">
                                    {{ strtoupper(substr($link->platform_name, 0, 1)) }}
                                </span>
                            </div>
                        @endif
                    </a>
                @empty
                    <p class="text-gray-500 dark:text-gray-400">No social links available.</p>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Footer Bottom --}}
    <div class="border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-950 text-center py-5 mt-10 text-sm text-gray-600 dark:text-gray-400">
        <p class="leading-relaxed">
            &copy; {{ date('Y') }} {{ $footerInfo->company_name ?? 'Your Company' }}.
            All rights reserved.
        </p>
    </div>
</footer>
