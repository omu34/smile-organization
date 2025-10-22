<div class="overflow-x-hidden bg-gray-100">

    <div class="overflow-x-hidden bg-gray-100">
        <div class="text-center py-4 bg-transparent text-gray-600">
            <h1 class="text-2xl text-pink-600 font-normal mb-5">Socials</h1>

            @php
                // Define your brand icons as raw SVG strings
                $brandIcons = [
                    'facebook' =>
                        '<svg class="w-6 h-6 text-blue-700" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>',
                    'instagram' => '<svg class="w-6 h-6 text-blue-700" fill="currentColor" ...>...</svg>', // Add other SVGs here
                    'linkedin' => '<svg class="w-6 h-6 text-blue-700" fill="currentColor" ...>...</svg>',
                    // Add any other social icons you need
                ];
            @endphp

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 justify-center">
                @foreach ($socialLinks as $link)
                    <a href="{{ $link->url }}" target="_blank" class="flex justify-center items-center gap-2">
                        @if ($link->icon)
                            {{-- Render the SVG from our array, with a fallback --}}
                            {!! $brandIcons[strtolower($link->icon)] ?? '<x-heroicon-o-globe-alt class="w-6 h-6 text-blue-700" />' !!}
                        @endif
                        <span class="text-white hover:text-blue-200">{{ $link->platform }}</span>
                    </a>
                @endforeach
            </div>
        </div>

        {{-- The rest of your footer code --}}
        <footer class="flex flex-col md:flex-row items-center justify-between w-full p-4 bg-pink-500">
            <span class="text-center md:text-left text-sm text-black">
                {{ $footerInfo->copyright_text ?? '© 2024 Smile™. All Rights Reserved.' }}
            </span>


            <ul class="flex flex-col md:flex-row gap-3 text-sm font-medium text-black">
                <li>
                    Office:
                    {{-- Use ?-> to safely access properties and ?? for a fallback --}}
                    <a href="{{ $footerInfo?->office_url ?? '#' }}" target="_blank" class="text-white hover:underline">
                        {{ $footerInfo?->office_location ?? 'Location Not Available' }}
                    </a>
                </li>
                <li>
                    Email:
                    <a href="mailto:{{ $footerInfo?->email ?? '' }}" class="text-white hover:underline">
                        {{ $footerInfo?->email ?? 'Email Not Available' }}
                    </a>
                </li>
                <li>
                    Call:
                    <a href="tel:{{ $footerInfo?->phone ?? '' }}" class="text-white hover:underline">
                        {{ $footerInfo?->phone ?? 'Phone Not Available' }}
                    </a>
                </li>
                <li class="flex gap-2">
                    @foreach ($ctas as $cta)
                        <a href="{{ $cta->url }}" target="_blank">
                            <button class="text-white {{ $cta->style_class }} rounded-lg px-4 py-2 text-sm">
                                {{ $cta->label }}
                            </button>
                        </a>
                    @endforeach
                </li>
            </ul>
        </footer>
    </div>
