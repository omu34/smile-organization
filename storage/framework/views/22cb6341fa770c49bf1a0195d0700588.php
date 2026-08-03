<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    
    
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="theme-color" content="#d13642" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net" />
    
    
    <title><?php echo e($title ?? config('app.name')); ?></title>
    <meta name="description" content="<?php echo e($description ?? 'Welcome to ' . config('app.name')); ?>" />
    <meta name="keywords" content="<?php echo e($keywords ?? config('app.name') . ', legal services, law firm, attorneys, legal advice'); ?>" />
    <meta name="author" content="<?php echo e($author ?? config('app.name')); ?>" />
    <meta name="language" content="en" />
    <meta name="generator" content="Laravel" />

    
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo e($title ?? config('app.name')); ?>" />
    <meta property="og:description" content="<?php echo e($description ?? 'Welcome to ' . config('app.name')); ?>" />
    <meta property="og:image" content="<?php echo e($ogImage ?? asset('images/og-default.jpg')); ?>" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:image:alt" content="<?php echo e($title ?? config('app.name')); ?>" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>" />
    <meta property="og:site_name" content="<?php echo e(config('app.name')); ?>" />
    <meta property="og:locale" content="en_US" />

    
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo e($title ?? config('app.name')); ?>" />
    <meta name="twitter:description" content="<?php echo e($description ?? 'Welcome to ' . config('app.name')); ?>" />
    <meta name="twitter:image" content="<?php echo e($ogImage ?? asset('images/og-default.jpg')); ?>" />
    <meta name="twitter:image:alt" content="<?php echo e($title ?? config('app.name')); ?>" />
    
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($schema)): ?>
        <?php echo $schema; ?>

    <?php else: ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "<?php echo e(config('app.name')); ?>",
        "url": "<?php echo e(url('/')); ?>",
        "description": "<?php echo e($description ?? 'Professional legal services'); ?>",
        "@id": "<?php echo e(url('/')); ?>#organization"
    }
    </script>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>

<body class="min-h-screen flex flex-col antialiased">
    <div class="flex-grow">
        <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    
    
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
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

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet"></noscript>
    <script>
        document.addEventListener('livewire:navigated', () => {
            AOS.init();
        });
    </script>

    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if ('IntersectionObserver' in window) {
                let lazyBgObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            let element = entry.target;
                            let bg = element.dataset.bg;
                            if (bg) {
                                element.style.backgroundImage = 'url(' + bg + ')';
                                element.classList.remove('lazy-bg');
                                lazyBgObserver.unobserve(element);
                            }
                        }
                    });
                });

                let lazyBgElements = document.querySelectorAll('.lazy-bg');
                lazyBgElements.forEach(function(element) {
                    lazyBgObserver.observe(element);
                });
            }
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

    
    <script>
    tailwind.config = {
        theme: {
            extend: {
                keyframes: {
                    rotate360: {
                        '0%': { transform: 'rotateY(0deg)' },
                        '100%': { transform: 'rotateY(360deg)' },
                    }
                },
                animation: {
                    rotate360: 'rotate360 120s linear infinite',
                }
            }
        }
    }
    </script>

</body>

</html>
<?php /**PATH F:\projects\smile-organization\resources\views\components\layouts\pages-layout.blade.php ENDPATH**/ ?>