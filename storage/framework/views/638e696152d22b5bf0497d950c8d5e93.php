<div class="p-6 bg-white rounded-lg shadow space-y-4">
    <h2 class="text-xl font-bold">Generate Image</h2>

    <textarea wire:model="prompt"
        class="w-full rounded border p-3"
        rows="4"
        placeholder="Describe the image you want..."></textarea>

    <button wire:click="generate"
        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
        Generate Image
    </button>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($loading): ?>
        <div class="text-gray-500 animate-pulse">Generating image...</div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($imageUrl): ?>
        <div class="mt-4">
            <img src="<?php echo e($imageUrl); ?>" class="rounded shadow max-w-full">
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div><?php /**PATH F:\projects\smile-organization\resources\views\livewire\ai\image-generator.blade.php ENDPATH**/ ?>