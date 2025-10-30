<div wire:poll.30s="loadLinks" class="flex justify-center md:justify-start space-x-4 mt-6">
    <?php $__empty_1 = true; $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <a href="<?php echo e($link->url); ?>"
           target="_blank"
           title="<?php echo e($link->platform_name); ?>"
           class="hover:opacity-80 transition-transform transform hover:scale-110">
            <img src="<?php echo e($link->full_image_path); ?>"
                 alt="<?php echo e($link->platform_name); ?>"
                 class="w-8 h-8 object-contain rounded-md">
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-gray-400">No active social links found.</p>
    <?php endif; ?>
</div><?php /**PATH C:\Users\Rygss\Downloads\smile-organization\resources\views\livewire\social-links-component.blade.php ENDPATH**/ ?>