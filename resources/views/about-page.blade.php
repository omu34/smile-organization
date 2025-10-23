<!DOCTYPE html>
<html lang="en">

<head>
    {{-- ✅ Basic Meta --}}
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- ✅ SEO & Social --}}
    <title>{{ $title ?? config('app.name') }}</title>
    <meta name="description" content="{{ $description ?? 'Welcome to ' . config('app.name') }}" />
    <meta name="keywords" content="{{ $keywords ?? config('app.name') . ', ecommerce, shop' }}" />
    <meta name="author" content="{{ $author ?? config('app.name') }}" />

    {{-- Open Graph / Facebook --}}
    <meta property="og:title" content="{{ $title ?? config('app.name') }}" />
    <meta property="og:description" content="{{ $description ?? 'Welcome to ' . config('app.name') }}" />
    <meta property="og:image" content="{{ $ogImage ?? asset('images/og-default.jpg') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $title ?? config('app.name') }}" />
    <meta name="twitter:description" content="{{ $description ?? 'Welcome to ' . config('app.name') }}" />
    <meta name="twitter:image" content="{{ $ogImage ?? asset('images/og-default.jpg') }}" />
    {{-- ✅ Styles --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

 <!-- End Google Tag Manager (noscript) -->
    <div class="">
        <!-- navbar -->
        <div x-data="{
                navigationMenuOpen: false,
                navigationMenu: '',
                navigationMenuCloseDelay: 200,
                navigationMenuCloseTimeout: null,
                navigationMenuLeave() {
                let that = this;
                this.navigationMenuCloseTimeout = setTimeout(() => {
                that.navigationMenuClose();
                }, this.navigationMenuCloseDelay);
                },
                navigationMenuReposition(navElement) {
                this.navigationMenuClearCloseTimeout();
                this.$refs.navigationDropdown.style.left = navElement.offsetLeft + 'px';
                this.$refs.navigationDropdown.style.marginLeft = (navElement.offsetWidth/2) + 'px';
                },
                navigationMenuClearCloseTimeout(){
                clearTimeout(this.navigationMenuCloseTimeout);
                },
                navigationMenuClose(){
                this.navigationMenuOpen = false;
                this.navigationMenu = '';
                }
                }"
            class="fixed md:top-1 left-0 right-0 z-50 w-full bg-pink-300 mx-auto rounded-lg max-w-7xl h-16  border-b border-gray-200">
            <!-- Fixed position with full width -->

            <div class="relative w-full flex items-center justify-center px-4 py-2">
                <!-- Logo Section -->
                <div class="flex items-center justify-start space-x-4 py-1">
                    <a href="home.html" class=""><img src="images/smile-logo.jpg" class="rounded-full md:h-10 w-10 h-5 "
                            alt="Logo" /></a>
                </div>

                <ul
                    class="flex items-center justify-center p-1 space-x-1 list-none md:mt-    rounded-md text-red-800 group ">

                    <li class="">
                        <button
                            :class="{ 'bg-neutral-100' : navigationMenu=='getting-started', 'hover:bg-neutral-100' : navigationMenu!='getting-started' }"
                            @mouseover="navigationMenuOpen=true; navigationMenuReposition($el); navigationMenu='getting-started'"
                            @mouseleave="navigationMenuLeave()"
                            class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors rounded-md hover:text-neutral-900 focus:outline-none disabled:opacity-50 disabled:pointer-events-none group w-max">
                            <span class="text-md md:text-lg">Getting started</span>
                            <svg :class="{ '-rotate-180' : navigationMenuOpen==true && navigationMenu == 'getting-started' }"
                                class="relative top-[1px] ml-1 h-3 w-3 ease-out duration-300"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                    </li>
                    <li>
                        <button
                            :class="{ 'bg-neutral-100' : navigationMenu=='learn-more', 'hover:bg-neutral-100' : navigationMenu!='learn-more' }"
                            @mouseover="navigationMenuOpen=true; navigationMenuReposition($el); navigationMenu='learn-more'"
                            @mouseleave="navigationMenuLeave()"
                            class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors rounded-md hover:text-neutral-900 focus:outline-none disabled:opacity-50 disabled:pointer-events-none bg-background hover:bg-neutral-100 group w-max">
                            <span class="text-md md:text-lg">Learn More</span>
                            <svg :class="{ '-rotate-180' : navigationMenuOpen==true && navigationMenu == 'learn-more' }"
                                class="relative top-[1px] ml-1 h-3 w-3 ease-out duration-300"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                    </li>
                    <li>
                        <a href="about.html"
                            class="inline-flex items-center text-md md:text-lg justify-center h-10 px-4 py-2 text-sm font-medium transition-colors rounded-md hover:text-neutral-900 focus:outline-none disabled:opacity-50 disabled:pointer-events-none bg-background hover:bg-neutral-100 group w-max">
                            About Us
                        </a>
                    </li>
                </ul>
            </div>
            <div x-ref="navigationDropdown" x-show="navigationMenuOpen"
                x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                @mouseover="navigationMenuClearCloseTimeout()" @mouseleave="navigationMenuLeave()"
                class="hidden md:block absolute top-0 pt-3 duration-200 ease-out -translate-x-1/2 translate-y-11" x-cloak>
                <!-- Dropdown content -->

                <div
                    class="flex justify-center w-auto h-auto overflow-hidden bg-white border rounded-md shadow-sm border-neutral-200/70">
                    <div x-show="navigationMenu == 'getting-started'"
                        class="flex items-stretch justify-center w-full max-w-2xl p-6 gap-x-3">
                        <div class="flex-shrink-0 w-48 rounded pt-28 pb-7 bg-gradient-to-br from-pink-200 to-pink-300 ">
                            <div class="relative px-7 space-y-1.5 text-white">
                                <img src="images/smile-logo.jpg" class="rounded-full h-12" alt="Logo" />

                                <span class="block font-bold">Smile WEB APP</span>
                            </div>
                        </div>
                        <div class="w-72">
                            <a href="#_" @click="navigationMenuClose()"
                                class="block px-3.5 py-3 text-sm rounded hover:bg-neutral-100">
                                <span class="group">
                                    <button
                                        class='block py-2 px-3 md:text-2xl text-lg  md:font-bold font-medium text-red-900 rounded hover:bg-pink-800 md:hover:bg-transparent  '
                                        href='' onclick="scrollToSection('section4')">Vision</button>
                                    <div class="w-0 group-hover:w-full h-0.5 bg-white ease-in-out duration-500"></div>
                                </span>
                                <span class="block font-light leading-5 opacity-50">
                                    Sfn advocates for the needs and rights of children with neurological
                                    conditions.</span>
                            </a>
                            <a href="#_" @click="navigationMenuClose()"
                                class="block px-3.5 py-3 text-sm rounded hover:bg-neutral-100">
                                <span class="group">
                                    <button aria-current='page'
                                        class='block py-2 px-3 md:text-2xl text-lg  md:font-bold font-medium text-red-900 rounded hover:bg-pink-800 md:hover:bg-transparent  '
                                        href='' onclick="scrollToSection('section2')">Impact</button>
                                    <div class="w-0 group-hover:w-full h-0.5 bg-white ease-in-out duration-500"></div>
                                </span>
                                <span class="block leading-5 opacity-50">
                                    SfN positively impacts the community by advocating for neurodiverse children’s
                                    rights.
                                </span>
                            </a>

                        </div>
                    </div>



                    <div x-show="navigationMenu == 'learn-more'" class="flex items-stretch justify-center w-full p-6">
                        <div class="w-72">
                            <a href="#_" @click="navigationMenuClose()"
                                class="block px-3.5 py-3 text-sm rounded hover:bg-neutral-100">
                                <span class="group">
                                    <button
                                        class='block py-2 px-3 md:text-2xl text-lg  md:font-bold font-medium text-red-900 rounded hover:bg-pink-800 md:hover:bg-transparent  '
                                        href='' onclick="scrollToSection('section5')">Partners</button>
                                    <div class="w-0 group-hover:w-full h-0.5 bg-white ease-in-out duration-500"></div>
                                </span>
                                <span class="block font-light leading-5 opacity-50">This how our partners say about our
                                    general help to the community.</span>
                            </a>
                            <a href="#_" @click="navigationMenuClose()"
                                class="block px-3.5 py-3 text-sm rounded hover:bg-neutral-100">
                                <span class="group">
                                    <button
                                        class='block py-2 px-3 md:text-2xl text-lg  md:font-bold font-medium text-red-900 rounded hover:bg-pink-800 md:hover:bg-transparent  '
                                        href='' onclick="scrollToSection('section3')">Resources</button>
                                    <div class="w-0 group-hover:w-full h-0.5 bg-white ease-in-out duration-500"></div>
                                </span>
                                <span class="block font-light leading-5 opacity-50">TSfN resources include advocacy
                                    tools, psychosocial support for caregivers, educational materials,

                                    recreational activities, access to affordable therapies and assistive
                                    devices.</span>
                            </a>

                        </div>
                        <div class="w-72">
                            <a href="#_" @click="navigationMenuClose()"
                                class="block px-3.5 py-3 text-sm rounded hover:bg-neutral-100">
                                <span class="group">
                                    <button
                                        class='block py-2 px-3 md:text-2xl text-lg  md:font-bold font-medium text-red-900 rounded hover:bg-pink-800 md:hover:bg-transparent  '
                                        href='' onclick="scrollToSection('section7')">Gallery</button>
                                    <div class="w-0 group-hover:w-full h-0.5 bg-white ease-in-out duration-500"></div>
                                </span>
                                <span class="block font-light leading-5 opacity-50">A framework without the complex
                                    setup or
                                    heavy dependencies.</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- hero section -->
        <div class="relative w-full font-bellmt md:-mt-16   h-[320px] md:h-[600px] text-white " id="home">
            <div class="absolute inset-0 opacity-90 ">
                <img src="images/smile23.jpg" alt="Background Image" class="object-cover object-center w-full h-full" />

            </div>
            <div
                class="absolute inset-9 flex flex-col md:mt-16 md:flex-row items-center justify-between max-w-6xl mx-auto">
                <div class="md:w-1/2 mb-4 md:mb-0">
                    <h1 class="text-grey-700 font-medium text-4xl md:text-5xl leading-tight mb-2">Smile For
                        NeuroDiversity
                    </h1>
                    <p class="font-regular text-xl mb-8 mt-4">Inspiring smiles and fostering joy within the
                        neurodiversity community.</p>
                    <a href="contact-us.html"
                        class="px-6 py-3 bg-[#801616] text-white font-medium rounded-full hover:bg-[#c09858]  transition duration-200">Contact
                        Us</a>
                </div>
            </div>
        </div>



        <!-- about us -->
        <section class="" id="aboutus" style="background-color: #FFFFFF;">
            <div class="max-w-7xl mx-auto py-16 ">
                <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8 ml-4 mr-4 md:ml-0 md:mr-0" data-aos="fade-up"
                    data-aos-duration="1000">
                    <div class="max-w-lg">
                        <h2 class="text-3xl font-bold text-[#d13642] mb-8 text-center">About <span
                                class="text-indigo-900">Us</span></h2>
                        <p class="mt-4 text-gray-600 text-lg">
                            We are a Kenyan organization, registered in 2020, dedicated to supporting persons with
                            disabilities. We work to address
                            a range of challenges faced by the PWD community and strive to create a more inclusive
                            society. We also collaborate with
                            other organizations and individuals to further our mission.
                        </p>
                    </div>
                    <div class="mt-12 md:mt-0">
                        <img src="images/afunction.jpg" alt="About Us Image" class="object-cover rounded-lg shadow-md">
                    </div>
                </div>
            </div>
        </section>

        <!-- why us  -->
        <section class="text-gray-700  body-font pt-10">
            <div class="max-w-7xl mx-auto" data-aos="fade-up" data-aos-duration="1000">
                <div class="flex justify-center text-3xl font-bold text-[#d13642] text-center">
                    <h1 class="">Why <span class="text-indigo-900">Us?</span></h1>
                </div>
                <div class="container  py-12 mx-auto">
                    <div class="flex flex-wrap text-center md:text-left justify-center">
                        <div class="p-4 md:w-1/4 sm:w-1/2">
                            <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                                <div class="flex justify-center">
                                    <img src="https://image3.jdomni.in/banner/13062021/58/97/7C/E53960D1295621EFCB5B13F335_1623567851299.png?output-format=webp"
                                        class="w-32 mb-3">
                                </div>
                                <h2 class="title-font font-regular text-2xl text-red-900">Focus on Empowerment and
                                    Inclusion:</h2>
                                <p class="mt-4 text-gray-600 text-lg">
                                    Smile is led by and includes individuals with lived experience of neurodiversity.
                                    This provides a unique and invaluable
                                    perspective, ensuring that our programs and services are genuinely informed by the
                                    needs and experiences of the
                                    neurodivergent community. We understand the nuances and complexities of
                                    neurodiversity on a personal level.
                                </p>

                            </div>
                        </div>

                        <div class="p-4 md:w-1/4 sm:w-1/2">
                            <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                                <div class="flex justify-center">
                                    <img src="https://image2.jdomni.in/banner/13062021/3E/57/E8/1D6E23DD7E12571705CAC761E7_1623567977295.png?output-format=webp"
                                        class="w-32 mb-3">
                                </div>
                                <h2 class="title-font font-regular text-2xl text-red-900">Focus on Empowerment and
                                    Inclusion:</h2>
                                <p class="mt-4 text-gray-600 text-lg">
                                    We prioritize empowering neurodivergent individuals to thrive. Our approach
                                    emphasizes strengths, celebrates
                                    neurodiversity, and promotes inclusion in all aspects of life – from education and
                                    employment to social participation
                                    and community engagement. We don't just provide support; we help build self-advocacy
                                    and independence.
                                </p>

                            </div>
                        </div>

                        <div class="p-4 md:w-1/4 sm:w-1/2">
                            <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                                <div class="flex justify-center">
                                    <img src="https://image3.jdomni.in/banner/13062021/16/7E/7E/5A9920439E52EF309F27B43EEB_1623568010437.png?output-format=webp"
                                        class="w-32 mb-3">
                                </div>
                                <h2 class="title-font font-regular text-2xl text-red-900">Collaborative and Holistic
                                    Approach:</h2>
                                <p class="mt-4 text-gray-600 text-lg">
                                    We believe in working together. We actively collaborate with families, educators,
                                    professionals, and other organizations
                                    to create a supportive ecosystem for neurodivergent individuals. Our holistic
                                    approach considers the whole person,
                                    addressing their diverse needs and fostering a sense of belonging
                                </p>
                            </div>
                        </div>

                        <div class="p-4 md:w-1/4 sm:w-1/2">
                            <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                                <div class="flex justify-center">
                                    <img src="https://image3.jdomni.in/banner/13062021/EB/99/EE/8B46027500E987A5142ECC1CE1_1623567959360.png?output-format=webp"
                                        class="w-32 mb-3">
                                </div>
                                <h2 class="title-font font-regular text-2xl text-red-900">Evidence-Based Practices and
                                    Continuous Improvement:</h2>
                                <p class="mt-4 text-gray-600 text-lg">
                                    We are committed to using evidence-based practices and continuously evaluating and
                                    improving our programs and services.
                                    We stay up-to-date with the latest research and best practices in the field of
                                    neurodiversity to ensure we provide the
                                    most effective support possible. We are dedicated to learning and growing to better
                                    serve our community.
                                </p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <!-- Visit us section -->
        <section class="bg-white">
            <div class="max-w-7xl mx-auto py-8  lg:py-20 " data-aos="fade-up" data-aos-duration="1000">
                <div class="max-w-2xl lg:max-w-4xl mx-auto text-center">
                    <h2 class="text-3xl font-extrabold text-[#d13642]" id="contactUs">Visit Our <span
                            class="text-indigo-900">Location</span></h2>
                    <p class="mt-3 text-lg text-gray-700">Let us serve for Better</p>
                </div>
                <div class="mt-8 lg:mt-20">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        <div class="max-w-full mx-auto rounded-lg overflow-hidden" data-aos="fade-in-left"
                            data-aos-duration="1000">
                            <div class="border-t border-gray-200 px-6 py-4">
                                <h3 class="text-lg font-bold text-red-700">Contact</h3>
                                <p class="mt-1 font-bold  text-gray-900 hover:text-red-800"><a
                                        href="+25471583034">Phone:
                                        +254715830347</a></p>
                                <a class="flex m-1" href="tel:+25471583034">
                                    <div class="flex-shrink-0">
                                        <div
                                            class="flex items-center justify-between h-10 w-30 rounded-md bg-red-700 hover:bg-red-900 text-white hover:text-white p-2">
                                            <!-- Hero icon name: phone -->
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
                                <h3 class="text-lg font-bold text-red-700">Our Address</h3>
                                <p class="mt-1 font-bold  text-gray-900 hover:text-red-800"><a target="_blank"
                                        class="hover:text-[#d13642]"
                                        href="https://www.google.com/maps/place/Masika+%26+Koross+Advocates">Kawangware
                                        PAG 46</a></p>
                            </div>
                            <div class="border-t border-gray-200 px-6 py-4">
                                <h3 class="text-lg font-bold text-red-700">Hours</h3>
                                <p class="mt-1 font-bold  text-gray-900 hover:text-red-8000">Monday - Sunday : 9am - 5pm
                                </p>
                            </div>
                        </div>

                        <div class="rounded-lg overflow-hidden order-none sm:order-first" data-aos="fade-up"
                            data-aos-duration="1000">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.81721131427!2d36.74243327495308!3d-1.2835442356230886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1a296f3ed247%3A0xc2a6c603d81fd025!2sKawangware%20PAG!5e0!3m2!1sen!2ske!4v1737123606037!5m2!1sen!2ske"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>


                        </div>

                    </div>
                </div>
            </div>
        </section>







        <!-- featured articles section -->
        <section data-aos="fade-up" data-aos-duration="1000" class="z-20 sticky top-0  ">
            <div class=" mb-1  md:mb-4 py-8 md:py-16  mx-auto max-w-7xl  ">
                <div class="">
                    <h2
                        class="  w-fit font-bold text-[#d13642] text-xl md:text-3xl  mb-4 pb-1 px-2 rounded-md border-b-2 border-red-800 text-center md:text-left">
                        Featured
                        <span class="text-indigo-900">Articles</span>
                    </h2>
                </div>
                <div class="mx-auto mt-8 grid gap-5 sm:grid-cols-2 md:grid-cols-3 lg:max-w-none pb-20">
                    <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
                        <div class="flex-shrink-0">
                            <img class="h-48 w-full object-cover transition-transform duration-500 transform ease-in-out hover:scale-110"
                                src="images/diaperss.jpg" alt="" />
                        </div>
                        <div class="flex flex-1 flex-col justify-between bg-white p-6">
                            <div class="flex-1">
                                <p class="  text-[#d13642]">
                                    <a href="about-us.html" class="  hover:text-red-600">
                                        read Article
                                        <span class="ml-1">&#8594;</span>
                                    </a>
                                </p>
                                <a href="#" class="mt-2 block">
                                    <p class="   text-gray-900">
                                        Understanding Neurodiversity: Beyond the Labels
                                    </p>
                                    <p class="mt-4   tracking-wide text-gray-900 md:text-base ">
                                        This article explores the concept of neurodiversity, moving beyond simple labels
                                        to understand the diverse range of neurological differences. It emphasizes the
                                        strengths and unique perspectives that come with neurodivergence and challenges
                                        common misconceptions. Relates to: Direct Lived Experience and Deep
                                        Understanding
                                    </p>
                                </a>
                            </div>
                            <div class="flex space-x-1    text-gray-500 mt-2">
                                <time datetime="2020-03-16">Mar 16, 2020</time>
                                <span aria-hidden="true">·</span>
                                <span>6 min read</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
                        <div class="flex-shrink-0">
                            <img class="h-48 w-full object-cover transition-transform duration-500 transform ease-in-out hover:scale-110"
                                src="images/smile16.jpg" alt="" />
                        </div>
                        <div class="flex flex-1 flex-col justify-between bg-white p-6">
                            <div class="flex-1">
                                <p class="  text-indigo-600">
                                    <a href="about-us.html" class="bell-regular  text-[#d13642] hover:text-red-600">
                                        view Video
                                        <span class="ml-1">&#8594;</span>
                                    </a>
                                </p>
                                <a href="#" class="mt-2 block">
                                    <p class="   text-gray-900">
                                        Empowering Neurodivergent Individuals in the Workplace
                                    </p>
                                    <p class="mt-4   tracking-wide text-gray-900 md:text-base ">
                                        This piece focuses on creating inclusive workplaces for neurodivergent
                                        individuals. It offers practical tips for employers on fostering supportive
                                        environments, promoting accessibility, and leveraging the unique talents of
                                        neurodivergent employees. It also provides resources for neurodivergent
                                        individuals navigating the job market. Relates to: Focus on Empowerment and
                                        Inclusion
                                    </p>
                                </a>
                            </div>
                            <div class="flex space-x-1   text-gray-500 mt-2">
                                <time datetime="2020-03-10">Mar 10, 2020</time>
                                <span aria-hidden="true">·</span>
                                <span>4 min read</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col hidden md:block overflow-hidden rounded-lg shadow-lg md:mb-0 mb-56">
                        <div class="flex-shrink-0">
                            <img class="h-48 w-full object-cover transition-transform duration-500 transform ease-in-out hover:scale-110"
                                src="images/smile17.jpg" alt="" />
                        </div>
                        <div class="flex flex-1 flex-col justify-between bg-white p-6 pb-24">
                            <div class="flex-1">
                                <p class="  text-indigo-600">
                                    <a href="about-us.html" class="bell-regular  text-[#d13642] hover:text-red-600">
                                        study
                                        <span class="ml-1">&#8594;</span>
                                    </a>
                                </p>
                                <a href="#" class="mt-2 block">
                                    <p class="   text-gray-900">
                                        Building a Collaborative Community for Neurodiversity
                                    </p>
                                    <p class="mt-4   tracking-wide text-gray-900 md:text-base ">
                                        This article highlights the importance of collaboration in supporting
                                        neurodivergent individuals. It showcases partnerships between families,
                                        educators, professionals, and community organizations, demonstrating how working
                                        together creates a stronger and more supportive ecosystem. Relates to:
                                        Collaborative and Holistic Approach
                                    </p>
                                </a>
                            </div>
                            <div class="flex space-x-1   text-gray-500 mt-2">
                                <time datetime="2020-02-12">Feb 12, 2020</time>
                                <span aria-hidden="true">·</span>
                                <span>11 min read</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="hidden md:block flex justify-end z-30">
            <div id="scrollToTopButton" class="scroll-to-top bottom-20 right-4  hidden " onclick="scrollToTop()">
                <svg fill="#000000" width="50px" height="50px" viewBox="0 0 24 24" id="up-arrow-circle"
                    data-name="Flat Color" xmlns="http://www.w3.org/2000/svg"
                    class="icon flat-color animate-pulse w-12 h-12">
                    <circle id="primary" cx="12" cy="12" r="10" style="fill: rgb(246, 136, 178);"></circle>
                    <path id="secondary" d="M10 16L14 16L14 10L16 10L12 6L8 10L10 10L10 16Z"
                        style="fill: rgb(44, 169, 188);">
                    </path>
                </svg>
            </div>
        </div>









        <div class=" overflow-x-hidden">
            <footer
                class=" gap-2 fixed text-md bottom-0 left-0 z-50 w-full p-2 bg-pink-500 border-t border-gray-200 shadow md:flex md:items-center md:justify-between dark:bg-gray-800 dark:border-gray-600">
                <span
                    class="md:justify-start justify-center  md:te max-w-7xl mx-auto  text-black sm:text-center dark:text-white">©
                    2024
                    <a href="/" class="hover:underline ">Smile™</a>. All Rights Reserved.
                </span>
                <ul
                    class="md:justify-end justify-center  max-w-7xl mx-auto flex flex-wrap items-center mt-3  font-medium text-black dark:text-pink-800 sm:mt-0">

                    <li class="">
                        Office Location:
                        <a target="_blank" href="https://maps.app.goo.gl/761ZZaRew5i5RbHc9"
                            class="hover:underline text-white hover:text-blue-700 me-4 md:me-6">
                            Kawangware PAG
                        </a>
                    </li>

                    <li class="flex justify-center md:justify-normal">
                        Email:
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSf6IRN1ykmzyqOWsrLC7l_ikuU3-Q3_ji0j6SCU4nRUPAqL0A/viewform?usp=sf_link"
                            class="hover:underline hover:text-blue-700 me-4 md:me-6">
                            <span class="text-white">
                                carolemoyo@gmail.com
                            </span>
                        </a>
                    </li>
                    <li class="">call:
                        <a href="tel:+254715830347" target="_blank"
                            class="dark:text-pink-700 hover:underline hover:text-blue-700 me-4 md:me-6">

                            <span class="text-white">+254715830347</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSf6IRN1ykmzyqOWsrLC7l_ikuU3-Q3_ji0j6SCU4nRUPAqL0A/viewform?usp=sf_link"
                            class="me-4 md:me-6" target="_blank">
                            <button type="button"
                                class="text-white bg-pink-700 hover:bg-pink-800  focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg  px-4 py-2 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-blue-800">
                                SignUp
                            </button>
                        </a>
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSf6IRN1ykmzyqOWsrLC7l_ikuU3-Q3_ji0j6SCU4nRUPAqL0A/viewform?usp=sf_link"
                            target="_blank" class="">
                            <button type="button"
                                class="text-white bg-pink-600 hover:bg-pink-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg  px-4 py-2 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-blue-800">
                                Donate
                            </button>
                        </a>
                    </li>
                </ul>
            </footer>
        </div>
    </div>
 @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="">
        AOS.init();
    </script>


</body>

</html>
