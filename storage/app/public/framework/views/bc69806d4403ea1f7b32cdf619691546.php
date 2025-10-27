<div
    x-data="{ wiggle: false }"
    x-init="
        Livewire.on('cart-updated', () => {
            wiggle = true;
            setTimeout(() => wiggle = false, 500);
        });
    "
>
    <button
        wire:click="openCart"
        class="relative  hover:bg-gray-700 shadow-lg rounded-full transition flex items-center justify-center"
        :class="{ 'animate-bounce': wiggle }"
    >
         <img src="<?php echo e(asset('storage/logos/add-to-cart.svg')); ?>" alt="Cart" class="w-6 h-6 md:h-10 md:w-10 ">
        <!--[if BLOCK]><![endif]--><?php if($count > 0): ?>
            <span
                class="absolute -top-1 -left-1 bg-red-600 text-xs font-bold text-white rounded-full h-5 w-5 flex items-center justify-center"
            >
                <?php echo e($count); ?>

            </span>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </button>
</div><?php /**PATH /Users/madebykush/Desktop/Dev folders/Roundi stores/e-commerce-cart/resources/views/livewire/cart-button.blade.php ENDPATH**/ ?>