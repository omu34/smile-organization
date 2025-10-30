<?php
    $hasChildren = $item->children && $item->children->count();
?>

<div class="group">
    <a
        href="<?php echo e($item->href ?? ('#' . $item->section_id)); ?>"
        class="block px-4 py-3 hover:bg-pink-50 rounded">
        <div class="flex justify-between items-center">
            <div>
                <div class="font-semibold text-red-900"><?php echo e($item->label); ?></div>
                <?php if($item->description): ?>
                    <p class="text-xs text-gray-500"><?php echo e($item->description); ?></p>
                <?php endif; ?>
            </div>
            <?php if($hasChildren): ?>
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            <?php endif; ?>
        </div>
    </a>

    <?php if($hasChildren): ?>
        <div class="ml-4 border-l pl-2">
            <?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('partials.nav-item', ['item' => $child], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\Rygss\Downloads\smile-organization\resources\views\partials\nav-item.blade.php ENDPATH**/ ?>