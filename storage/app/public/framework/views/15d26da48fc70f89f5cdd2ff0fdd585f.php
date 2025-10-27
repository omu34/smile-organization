<div class="flex items-center justify-between px-4 py-2 rounded-full bg-transparent -ml-4">
    <!-- Logo -->
    <a href="<?php echo e($link ?? '/'); ?>" target="_blank">
    <!--[if BLOCK]><![endif]--><?php if($logo): ?>
        <img 
            src="<?php echo e(Str::startsWith($logo, ['http://', 'https://']) ? $logo : asset('storage/' . $logo)); ?>" 
            alt="Site Logo" 
            class="transition transform hover:scale-110 rounded-full h-12"
        >
    <?php else: ?>
        <span class="text-lg font-bold">MyShop</span>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</a>



</div><?php /**PATH /Users/madebykush/Desktop/Dev folders/Roundi stores/e-commerce-cart/resources/views/livewire/navigation-logo-header.blade.php ENDPATH**/ ?>