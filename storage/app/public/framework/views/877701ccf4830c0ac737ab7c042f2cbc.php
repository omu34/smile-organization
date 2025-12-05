<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($title ?? config('app.name')); ?></title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>

<body x-data="{ cartOpen: false }" @open-cart.window="cartOpen = true" @keydown.escape.window="cartOpen = false" x-cloak
    class="sticky top-0 z-50 w-full border-b bg-background/95 backdrop-blur supports-[backdrop-filter]:bg-background/60 dark:border-gray-800 dark:bg-background/95 dark:backdrop-blur dark:supports-[backdrop-filter]:dark:bg-background/60">

    <div class="min-h-screen flex flex-col">
        <main class="flex-grow">
            <div class="mx-auto max-w-12xl sm:px-6 lg:px-8">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <div class=" fixed-0 bg-gray-200 mx-auto max-w-10xl sm:px-6 lg:px-8 z-50">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('site-footer', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3431099492-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
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
<?php /**PATH /Users/madebykush/Desktop/Dev folders/accessory-page-clone/burner-supply-app/resources/views/components/layouts/page-layout.blade.php ENDPATH**/ ?>
