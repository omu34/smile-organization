<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($title ?? config('app.name')); ?></title>

    <!-- Preload Outfit font for better performance -->
    <link rel="preload" href="<?php echo e(Vite::asset('resources/fonts/Outfit-VariableFont_wght.ttf')); ?>" as="font" type="font/ttf" crossorigin>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>

<body x-data="{ cartOpen: false }" @open-cart.window="cartOpen = true" @keydown.escape.window="cartOpen = false" x-cloak
    class="sticky top-0 z-50 w-full  bg-background/95 backdrop-blur supports-[backdrop-filter]:bg-background/60 dark:border-gray-800 dark:bg-background/95 dark:backdrop-blur dark:supports-[backdrop-filter]:dark:bg-background/60">

    <div class="min-h-screen flex flex-col">
        <main class="flex-grow">
            <div class="mx-auto max-w-12xl sm:px-6 lg:px-8">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </main>
    </div>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // SweetAlert listener for Livewire toasts
        document.addEventListener('livewire:init', () => {
            Livewire.on('toast', ({
                message,
                type = 'success'
            }) => {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: type,
                    title: message,
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
            });
        });

        // SweetAlert confirmation for removing an item
        function confirmRemove(itemId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('removeItem', {
                        id: itemId
                    });
                }
            });
        }
    </script>
</body>

</html>
<?php /**PATH /Users/madebykush/Desktop/Dev folders/Roundi stores/e-commerce-cart/resources/views/components/layouts/page-layout.blade.php ENDPATH**/ ?>