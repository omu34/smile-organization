<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-3">Your Recent AI Generations</h2>

    <ul class="space-y-3">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="border rounded p-3 bg-gray-50">
                <div class="text-sm text-gray-500"><?php echo e($asset->created_at->diffForHumans()); ?></div>

                <div class="font-semibold"><?php echo e(ucfirst($asset->type)); ?></div>
                <div class="text-gray-700">Prompt: <?php echo e(Str::limit($asset->prompt, 80)); ?></div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($asset->type === 'text'): ?>
                    <p class="mt-2"><?php echo e(Str::limit($asset->result_text, 120)); ?></p>
                <?php else: ?>
                    <img src="<?php echo e($asset->image_url); ?>" class="mt-2 w-48 rounded shadow">
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </ul>
</div><?php /**PATH F:\projects\smile-organization\resources\views\livewire\ai\user-assets.blade.php ENDPATH**/ ?>