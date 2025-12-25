<footer data-aos="fade-up" data-aos-duration="1000"
    class="bg-gray-300 rounded-lg dark:bg-gray-900 text-gray-800 dark:text-gray-100 border-t border-gray-200 dark:border-gray-700 shadow-sm shadow-emerald-100/50 dark:shadow-emerald-900/20">

    {{-- Main Grid --}}
    <div class="mx-auto  px-6 sm:px-10 py-14 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">

        {{-- Footer Info --}}
        <div class="space-y- text-center sm:text-left">
            @if ($footerInfo)
                <div class="flex -mt-6 justify-center md:justify-self-start">
                    <livewire:navigation-logo-header-component />
                </div>

                <p class="leading-relaxed font-medium text-gray-700 dark:text-gray-300 text-[15px]">
                    {{ $footerInfo->description }}
                </p>

                <div class="space-y-2 text-gray-600 dark:text-gray-400 text-sm">
                    @if ($footerInfo->address)
                        <p>
                            <span class="font-semibold text-gray-800 dark:text-gray-200">Address:</span>
                            {{ $footerInfo->address }}
                        </p>
                    @endif

                    @if ($footerInfo->phone)
                        <p>
                            <span class="font-semibold text-gray-800 dark:text-gray-200">Phone:</span>
                            {{ $footerInfo->phone }}
                        </p>
                    @endif

                    @if ($footerInfo->email)
                        <p>
                            <span class="font-semibold text-gray-800 dark:text-gray-200">Email:</span>
                            {{ $footerInfo->email }}
                        </p>
                    @endif
                </div>

            @else
                <p class="text-gray-500 dark:text-gray-400">Footer info not available.</p>
            @endif
        </div>

        {{-- Call To Action --}}
        <div
            class="bg-black dark:bg-emerald-700 text-white rounded-2xl p-8 flex flex-col items-center text-center shadow-inner shadow-emerald-900/30 hover:shadow-emerald-600/40 transition-all duration-300">

            @if ($footerCta)
                <h3 class="text-2xl font-bold mb-2 tracking-tight">
                    {{ $footerCta->title }}
                </h3>

                <p class="mb-6 text-gray-300 dark:text-gray-100/90 max-w-sm leading-relaxed">
                    {{ $footerCta->subtitle }}
                </p>

                @if ($footerCta->button_text && $footerCta->button_link)
                    <a href="{{ $footerCta->button_link }}"
                       class="bg-white dark:bg-gray-900 text-black dark:text-white px-7 py-3 rounded-lg font-medium
                              hover:bg-emerald-600 hover:text-white dark:hover:bg-emerald-800 transition-all duration-300
                              shadow-md hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        {{ $footerCta->button_text }}
                    </a>
                @endif

            @else
                <p class="text-gray-400 dark:text-gray-200">CTA not configured.</p>
            @endif
        </div>

        {{-- Social Links --}}
        <div class="space-y-6 text-center sm:text-left">
            <h2 class="text-xl font-bold tracking-tight text-gray-900 dark:text-gray-100">Follow Us</h2>

            <div wire:poll.30s="loadFooterData"
                 class="flex flex-wrap justify-center sm:justify-start gap-4">

                @forelse ($socialLinks as $link)
                    <a href="{{ $link->url }}"
                       target="_blank" rel="noopener"
                       title="{{ $link->platform_name }}"
                       class="transition-transform duration-300 hover:scale-110 hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-emerald-500 rounded-md">

                        @if ($link->image_path)
                            <img src="{{ asset('storage/' . $link->image_path) }}"
                                 alt="{{ $link->platform_name }}"
                                 class="w-10 h-10 object-contain rounded-md shadow-sm hover:shadow-md transition-all duration-300">
                        @else
                            <div
                                class="w-10 h-10 bg-black dark:bg-gray-800 rounded-md flex items-center justify-center shadow-sm hover:shadow-md transition-all duration-300">
                                <span class="text-sm text-white font-bold uppercase">
                                    {{ substr($link->platform_name, 0, 1) }}
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
    <div
        class=" text-center py-6 mt-6 text-sm text-gray-600 dark:text-gray-400 ">
        <p>&copy; {{ date('Y') }} {{ $footerInfo->company_name ?? 'Your Company' }} — All rights reserved.</p>
    </div>

</footer>
