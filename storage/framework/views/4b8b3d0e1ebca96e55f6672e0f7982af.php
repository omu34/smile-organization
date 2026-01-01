<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

    
    <title><?php echo e($title ?? config('app.name')); ?></title>
    <meta name="description" content="<?php echo e($description ?? 'Welcome to ' . config('app.name')); ?>" />
    <meta name="keywords" content="<?php echo e($keywords ?? config('app.name') . ', ecommerce, shop'); ?>" />
    <meta name="author" content="<?php echo e($author ?? config('app.name')); ?>" />

    
    <meta property="og:title" content="<?php echo e($title ?? config('app.name')); ?>" />
    <meta property="og:description" content="<?php echo e($description ?? 'Welcome to ' . config('app.name')); ?>" />
    <meta property="og:image" content="<?php echo e($ogImage ?? asset('images/og-default.jpg')); ?>" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>" />
    <meta property="og:type" content="website" />

    
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo e($title ?? config('app.name')); ?>" />
    <meta name="twitter:description" content="<?php echo e($description ?? 'Welcome to ' . config('app.name')); ?>" />
    <meta name="twitter:image" content="<?php echo e($ogImage ?? asset('images/og-default.jpg')); ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>

<body class="min-h-screen flex flex-col antialiased  ">
    <div class="flex-grow ">
        <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-6  ">
            
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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

    <div x-data="{ notify: false }" x-on:notify.window="notify = true; setTimeout(() => notify = false, 3000)"
        x-show="notify" class="fixed top-4 right-4 bg-green-600 text-white px-4 py-2 rounded shadow-lg">
        Slider updated in real-time!
    </div>


    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script>
        document.addEventListener('livewire:navigated', () => {
            AOS.init();
        });
    </script>

    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new Swiper(".mySwiper", {
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                effect: "fade",
                speed: 1200,
                fadeEffect: {
                    crossFade: true
                },
            });
        });
    </script>

</body>

</html>
<?php /**PATH C:\Users\Bernard O\Downloads\herd-projects\smile-with-ai\resources\views/components/layouts/about-layout.blade.php ENDPATH**/ ?>