<div wire:poll.30s="loadLinks" class="flex flex-wrap justify-center md:justify-start gap-4">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <a href="<?php echo e($link->url); ?>"
           target="_blank"
           rel="noopener"
           title="<?php echo e($link->platform_name); ?>"
           class="transition-transform duration-300 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-red-600 rounded-lg">

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($link->full_image_path): ?>
                <img src="<?php echo e($link->full_image_path); ?>"
                     alt="<?php echo e($link->platform_name); ?>"
                     class="w-10 h-10 object-contain rounded-lg bg-gray-50 border border-gray-200 p-1.5 shadow-sm transition-all duration-300 hover:border-red-600">
            <?php else: ?>
                <div class="w-10 h-10 bg-gray-100 border border-gray-200 rounded-lg flex items-center justify-center shadow-sm hover:border-red-600 transition-all duration-300">
                    <span class="text-xs text-gray-900 font-bold uppercase">
                        <?php echo e(substr($link->platform_name, 0, 1)); ?>

                    </span>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-gray-500 text-sm font-medium">No active social links found.</p>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div><?php /**PATH F:\projects\smile-organization\resources\views\livewire\social-links-component.blade.php ENDPATH**/ ?>