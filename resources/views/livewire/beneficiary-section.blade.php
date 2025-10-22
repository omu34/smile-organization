<div data-aos="fade-up" data-aos-duration="1000">
    <section class="py-16 pb-14 bg-gray-100" id="beneficiaries">
        <div class="mx-auto max-w-7xl px-5">
            <div class="mb-5 md:w-3/4">
                <h1 class="text-pink-800 text-2xl mb-2 font-bold w-fit pb-4 px-2 border-b-2 border-blue-600 dark:border-yellow-600">
                    Beneficiaries
                </h1>
                <p class="text-md font-normal text-black">
                    Those whose lives have been transformed by SFN's support,
                    and individuals who have benefited from our programs and services.
                </p>
            </div>

            <div class="flex flex-wrap -mx-4 mt-10">
                @foreach($beneficiaries as $item)
                    <div wire:key="beneficiary-{{ $item->id }}" class="w-full px-4 md:w-1/2 lg:w-1/3 mb-10">
                        <div class="mx-auto max-w-[370px] group hover:scale-105 transition-transform">
                            <div class="relative pb-56">
                                <img src="{{ asset($item->image_path) }}" alt="{{ $item->title }}"
                                    class="absolute inset-0 w-full h-full object-cover rounded-xl">
                            </div>
                            <div>
                                <span class="bg-primary mb-5 inline-block rounded py-1 px-4 text-xs font-semibold text-pink-800">
                                    {{ $item->published_at?->format('M d, Y') }}
                                </span>
                                <h3>
                                    <a href="javascript:void(0)"
                                       class="text-dark hover:text-primary mb-4 inline-block text-xl font-semibold">
                                        {{ $item->title }}
                                    </a>
                                </h3>
                                <p class="text-base text-gray-700">
                                    {{ $item->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
