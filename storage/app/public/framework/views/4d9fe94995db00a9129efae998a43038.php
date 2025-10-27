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
        class="relative p-3 bg-[#1762A5] hover:bg-[#13508a] rounded-full transition-colors duration-200 md:ml-6 self-end md:self-start"
        :class="{ 'animate-bounce': wiggle }"
    >
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="w-6 h-6 text-white">
            <circle cx="8" cy="21" r="1"></circle>
            <circle cx="19" cy="21" r="1"></circle>
            <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
        </svg>

        <!--[if BLOCK]><![endif]--><?php if($count > 0): ?>
            <span
                class="absolute -top-2 -right-2 bg-white text-[#1762A5] text-xs rounded-full w-6 h-6 flex items-center justify-center font-semibold border-2 border-[#1762A5]"
            >
                <?php echo e($count); ?>

            </span>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </button>
</div><?php /**PATH /Users/madebykush/Desktop/Dev folders/e-commerce-cart/resources/views/livewire/cart-button.blade.php ENDPATH**/ ?>