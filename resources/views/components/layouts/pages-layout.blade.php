<!DOCTYPE html>
<html lang="en">

<head>
    {{-- ✅ Basic Meta --}}
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- ✅ Performance & SEO --}}
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="theme-color" content="#d13642" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net" />

    {{-- ✅ SEO & Social --}}
    <title>{{ $title ?? config('app.name') }}</title>
    <meta name="description" content="{{ $description ?? 'Welcome to ' . config('app.name') }}" />
    <meta name="keywords"
        content="{{ $keywords ?? config('app.name') . ', legal services, law firm, attorneys, legal advice' }}" />
    <meta name="author" content="{{ $author ?? config('app.name') }}" />
    <meta name="language" content="en" />
    <meta name="generator" content="Laravel" />

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $title ?? config('app.name') }}" />
    <meta property="og:description" content="{{ $description ?? 'Welcome to ' . config('app.name') }}" />
    <meta property="og:image" content="{{ $ogImage ?? asset('images/og-default.jpg') }}" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:image:alt" content="{{ $title ?? config('app.name') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <meta property="og:locale" content="en_US" />


    {{-- favicon --}}
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="manifest" href="/site.webmanifest" />

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $title ?? config('app.name') }}" />
    <meta name="twitter:description" content="{{ $description ?? 'Welcome to ' . config('app.name') }}" />
    <meta name="twitter:image" content="{{ $ogImage ?? asset('images/og-default.jpg') }}" />
    <meta name="twitter:image:alt" content="{{ $title ?? config('app.name') }}" />

    {{-- Schema.org JSON-LD --}}
    @if (isset($schema))
        {!! $schema !!}
    @else
        <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": "Organization",
        "name": "{{ config('app.name') }}",
        "url": "{{ url('/') }}",
        "description": "{{ $description ?? 'Professional legal services' }}",
        "@id": "{{ url('/') }}#organization"
    }
    </script>
    @endif

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    {{-- ✅ Styles --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-screen flex flex-col antialiased">
    <div class="flex-grow">
        <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
            @yield('content')
        </main>
    </div>

    {{-- ✅ Scripts --}}
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
    

    <div x-data="{ notify: false }" x-on:notify.window="notify = true; setTimeout(() => notify = false, 3000)"
        x-show="notify" class="fixed top-4 right-4 bg-green-600 text-white px-4 py-2 rounded shadow-lg">
        Slider updated in real-time!
    </div>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" media="print"
        onload="this.media='all'">
    <noscript>
        <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    </noscript>  

</body>

</html>
