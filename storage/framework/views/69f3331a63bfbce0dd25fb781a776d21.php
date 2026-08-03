<?php
$conversation = $record;
$messages = $conversation->messages()->get();
?>

<div class="p-4 space-y-4 max-h-[60vh] overflow-auto">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="<?php echo e($m->role === 'user' ? 'text-right' : 'text-left'); ?>">
            <div class="inline-block p-3 rounded shadow <?php echo e($m->role === 'user' ? 'bg-blue-600 text-white' : 'bg-white border'); ?>">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($m->meta['type']) && $m->meta['type'] === 'image'): ?>
                    <img src="<?php echo e($m->meta['url']); ?>" class="w-48 h-48 object-cover rounded" />
                <?php else: ?>
                    <div class="whitespace-pre-wrap"><?php echo e($m->content); ?></div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div class="text-xs text-gray-400"><?php echo e($m->created_at->diffForHumans()); ?></div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div><?php /**PATH F:\projects\smile-organization\resources\views\livewire\filament\forms\components\chat-history.blade.php ENDPATH**/ ?>