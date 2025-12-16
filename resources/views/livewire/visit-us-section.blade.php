<div data-aos="fade-up" data-aos-duration="1000">
    <section class="bg-white">
        <div class=" mx-auto py-8 lg:py-20" data-aos="fade-up" data-aos-duration="1000">
            <div class="max-w-2xl lg:max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-extrabold text-[#000000]" id="contactUs">
                    Visit Our <span class="">Location</span>
                </h2>
                <p class="mt-3 text-md text-gray-700">Let us serve for Better</p>
            </div>

            <div class="mt-8 lg:mt-20">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-1 ">

                    {{-- 📞 CONTACT INFO --}}
                    <div class="max-w-full mx-auto rounded-lg overflow-hidden" data-aos="fade-in-left"
                        data-aos-duration="1000">
                        <div class="border-t border-gray-200 px-6 py-4">
                            <h3 class="text-md font-bold text-black">Contact</h3>
                            <p class="mt-1 font-bold text-black hover:text-gray-700">
                                <a href="tel:+254715830347" id="contactPhone">Phone:
                                    {{ $contact?->phone ?? '+254715830347' }}</a>
                            </p>
                            <a class="flex m-1" href="tel:+254715830347" id="contactPhoneBtn">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex items-center justify-between h-10 w-30 rounded-md bg-red-700 hover:bg-gray-700 text-white hover:text-white p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                        </svg>
                                        Call now
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="px-6 py-4">
                            <h3 class="text-md font-bold text-black">Our Address</h3>
                            <p class="mt-1 font-bold text-black hover:text-gray-700">
                                <a target="_blank" class="hover:text-gray-700" id="contactAddress"
                                    href="{{ $contact?->google_map_url ?? 'https://www.google.com/maps/place/Kawangware+PAG' }}">
                                    {{ $contact?->address ?? 'Kawangware PAG 46' }}
                                </a>
                            </p>
                        </div>

                        <div class="border-t border-gray-200 px-6 py-4">
                            <h3 class="text-md font-bold text-black">Hours</h3>
                            <p class="mt-1 font-bold text-black hover:text-gray-700" id="contactHours">
                                {{ $contact?->hours ?? 'Monday - Sunday : 9am - 5pm' }}
                            </p>
                        </div>
                    </div>

                    {{-- 🗺️ MAP --}}
                    <div class="rounded-lg overflow-hidden order-none sm:order-first" data-aos="fade-up"
                        data-aos-duration="1000">
                        <iframe id="contactMap"
                            src="{{ $contact?->google_map_embed ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.81721131427!2d36.74243327495308!3d-1.2835442356230886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1a296f3ed247%3A0xc2a6c603d81fd025!2sKawangware%20PAG!5e0!3m2!1sen!2ske!4v1737123606037!5m2!1sen!2ske' }}"
                            width="2400" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                </div>
            </div>
        </div>
    </section>



</div>
