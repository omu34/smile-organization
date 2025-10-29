<div>
    <a href="<?php echo e($link ?? '/'); ?>" target="_blank">
        <!--[if BLOCK]><![endif]--><?php if($logo): ?>
            <img src="<?php echo e($logo); ?>" alt="Site Logo" class="h-10 md:h-12 w-auto rounded-full">
        <?php else: ?>
            <span class="text-lg font-bold">MyShop</span>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </a>
</div>
<?php /**PATH C:\Users\Rygss\Downloads\smile-organization\resources\views/livewire/navigation-logo-header-component.blade.php ENDPATH**/ ?>