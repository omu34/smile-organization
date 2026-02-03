<div data-aos="fade-up" data-aos-duration="1000">
    <div class="py-16 pb-14 mx-auto" id="beneficiaries">
        <div class="  px-5">
            {{-- @if ($areaTitle) --}}
        <div class="flex justify-start item-1 md:justify-center items-center flex-col md:py-4">
                <h2
                    class="font-bold text-xl md:text-3xl leading-tight mb-2 text-[#d13642]  rounded-md border-b-2 border-red-800 text-center md:text-left">
                    {{-- {{$areaTitle->title}} --}}Beneficiaries
                    {{-- <span class="text-indigo-900">Experience</span> --}}
                </h2>
                <h4
                    class="sm:text-lg md:text-xl  text-lg  font-medium text-gray-800 mt-4 tracking-wide  mx-auto max-w-lg ml-4 mr-4 md:ml-0 md:mr-0 text-center">
                    {{-- {{$areaTitle->description}} --}} Welcome
                    
                </h4>
            </div>
            {{-- @else --}}
                {{-- <p class="text-gray-500 dark:text-gray-400">Footer info not available.</p> --}}
            {{-- @endif --}}

            <div class="flex flex-wrap -mx-4 mt-10">
                @foreach ($beneficiaries as $item)
                    <div wire:key="beneficiary-{{ $item->id }}" class="w-full px-4 md:w-1/2 lg:w-1/3 mb-10">
                        <div class="mx-auto max-w-[370px] group hover:scale-105 transition-transform">
                            <div class="relative pb-6">
                                <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}"
                                    class="w-full h-64 md:h-80 object-cover rounded-xl shadow-md transition-transform transform hover:scale-105">
                            </div>
                            <div>
                                <span class=" mb-5 inline-block rounded py-1 px-4 text-xs font-semibold text-black">
                                    {{ $item->published_at?->format('M d, Y') }}
                                </span>
                                <h3>
                                    <a href="javascript:void(0)"
                                        class="text-dark hover:text-primary mb-4 inline-block text-xl font-semibold">
                                        {{ $item->title }}
                                    </a>
                                </h3>
                                <p class="text-base text-black">
                                    {{ $item->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
