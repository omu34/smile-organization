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
    class="sticky top-0 z-50 w-full  ">

    <div class="min-h-screen flex flex-col ">
<?php
    $background = $background ?? \App\Models\BackgroundColors::first();
?>

    <?php if($background): ?>
        <main class="flex-grow  "
        style="background-color: <?php echo e($background->bg_color); ?>;">
            <div class="mx-auto max-w-12xl sm:px-6 lg:px-8">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </main>
    <?php else: ?>
        <main class="flex-grow  bg-background">
            <div class="mx-auto max-w-12xl sm:px-6 lg:px-8">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </main>
    <?php endif; ?>
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

    <script>
    document.addEventListener('alpine:init', () => {
        window.addEventListener('open-product-modal', e => {
            Livewire.dispatch('openProductModal', { productId: e.detail.productId })
        })
    })
</script>

</body>

</html>
<?php /**PATH /Users/madebykush/Desktop/Dev folders/e-commerce-cart/resources/views/components/layouts/page-layout.blade.php ENDPATH**/ ?>