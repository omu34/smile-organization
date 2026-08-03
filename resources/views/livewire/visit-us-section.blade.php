<div data-aos="fade-up" data-aos-duration="1000">
    <section class="bg-white py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="flex flex-col items-center md:items-start text-center md:text-left mb-16">
                <!-- Red Accent Line -->
                <div class="hidden md:block h-1 w-16 bg-red-600 mb-4"></div>
                
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight mb-4 uppercase">
                    Visit Our Location
                </h2>
                
                <h4 class="text-lg md:text-xl text-gray-600 max-w-2xl font-medium">
                    Let us serve for the better
                </h4>
            </div>

            <!-- Content Grid -->
            <div class="mt-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">

                    <!-- 📞 CONTACT INFO CARD -->
                    <div class="lg:col-span-5 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 p-8 flex flex-col justify-between relative overflow-hidden group">
                        <!-- Top Accent Line -->
                        <div class="absolute top-0 left-0 w-full h-1 bg-gray-900 group-hover:bg-red-600 transition-colors duration-300"></div>

                        <div class="space-y-6">
                            <!-- Contact Phone -->
                            <div class="pb-6 border-b border-gray-100">
                                <span class="text-xs font-bold uppercase tracking-wider text-red-600 block mb-1">Call Us Directly</span>
                                <h3 class="text-xl font-bold text-gray-900 mb-3">
                                    <a href="tel:+254715830347" id="contactPhone" class="hover:text-red-600 transition-colors">
                                        {{ $contact?->phone ?? '+254715830347' }}
                                    </a>
                                </h3>
                                <a href="tel:+254715830347" id="contactPhoneBtn" class="inline-flex items-center justify-center bg-red-600 hover:bg-red-700 text-white font-bold uppercase tracking-wider text-xs px-5 py-3 rounded-xl transition-all duration-300 shadow-md hover:shadow-red-900/30">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                    </svg>
                                    Call Now
                                </a>
                            </div>

                            <!-- Address -->
                            <div class="pb-6 border-b border-gray-100">
                                <span class="text-xs font-bold uppercase tracking-wider text-red-600 block mb-1">Our Location</span>
                                <h3 class="text-lg font-bold text-gray-900">
                                    <a target="_blank" class="hover:text-red-600 transition-colors" id="contactAddress"
                                        href="{{ $contact?->google_map_url ?? 'https://www.google.com/maps/place/Kawangware+PAG' }}">
                                        {{ $contact?->address ?? 'Kawangware PAG 46' }}
                                    </a>
                                </h3>
                            </div>

                            <!-- Hours -->
                            <div>
                                <span class="text-xs font-bold uppercase tracking-wider text-red-600 block mb-1">Working Hours</span>
                                <p class="text-gray-800 font-semibold text-base" id="contactHours">
                                    {{ $contact?->hours ?? 'Monday - Sunday : 9am - 5pm' }}
                                </p>
                            </div>
                        </div>

                        <div class="mt-8 pt-4 border-t border-gray-100 flex items-center text-xs font-bold text-gray-400 uppercase tracking-widest">
                            <span>Open For All Visitors</span>
                        </div>
                    </div>

                    <!-- 🗺️ MAP CARD -->
                    <div class="lg:col-span-7 rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 bg-gray-50 flex flex-col">
                        <div class="relative w-full h-full min-h-[400px]">
                            <iframe id="contactMap"
                                src="{{ $contact?->google_map_embed ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.81721131427!2d36.74243327495308!3d-1.2835442356230886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1a296f3ed247%3A0xc2a6c603d81fd025!2sKawangware%20PAG!5e0!3m2!1sen!2ske!4v1737123606037!5m2!1sen!2ske' }}"
                                class="w-full h-full absolute inset-0 border-0" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>