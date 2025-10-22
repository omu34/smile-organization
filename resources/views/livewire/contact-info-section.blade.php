<div>
    <section class="bg-gray-50 py-12" x-data="{ show: true }" x-show="show" x-transition>
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-2">
                    Contact Information
                </h2>
                <p class="text-gray-600">
                    Get in touch with us — we’d love to hear from you.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($contactInfos as $info)
                    <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition duration-300">
                        <div class="mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-blue-500"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-9 5v9" />
                            </svg>
                        </div>

                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $info->title }}</h3>

                        @if ($info->phone)
                            <p class="text-gray-600">
                                <strong>Phone:</strong>
                                <a href="tel:{{ $info->phone }}"
                                    class="text-blue-600 hover:underline">{{ $info->phone }}</a>
                            </p>
                        @endif

                        @if ($info->email)
                            <p class="text-gray-600 mt-1">
                                <strong>Email:</strong>
                                <a href="mailto:{{ $info->email }}"
                                    class="text-blue-600 hover:underline">{{ $info->email }}</a>
                            </p>
                        @endif

                        @if ($info->address)
                            <p class="text-gray-600 mt-1">
                                <strong>Address:</strong> {{ $info->address }}
                            </p>
                        @endif

                        @if ($info->google_map_iframe)
                            <div class="mt-4 overflow-hidden rounded-lg">
                                <iframe src="{{ $info->google_map_iframe }}" class="w-full h-48 border-0 rounded-lg"
                                    loading="lazy">
                                </iframe>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="col-span-3 text-center text-gray-500">
                        No contact information available.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

</div>
