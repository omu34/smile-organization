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

<body class="min-h-screen flex flex-col antialiased  ">
    <div class="flex-grow ">
        <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-6  ">
            {{-- shadow-md shadow-emerald-200 hover:shadow-lg --}}
            @yield('content')
        </main>
    </div>
    {{-- ✅ Scripts --}}
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.Echo.channel('videos')
            .listen('.VideoUpdated', (e) => {
                const video = document.getElementById('hero-video');
                if (video) {
                    const source = video.querySelector('source');
                    source.src = e.videoUrl;
                    video.load();
                    video.play();
                }
            });
    </script>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script>
    document.addEventListener('livewire:navigated', () => {
        AOS.init();
    });
</script>
</body>

</html>
