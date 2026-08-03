<div class="p-6 bg-white rounded-lg shadow space-y-4">
    <h2 class="text-xl font-bold">Generate Text</h2>

    <textarea wire:model="prompt"
        class="w-full rounded border p-3"
        rows="4"
        placeholder="Describe what you want..."></textarea>

    <button wire:click="generate"
        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        Generate
    </button>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($loading): ?>
        <div class="text-gray-500 animate-pulse">Generating...</div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($result): ?>
        <div class="p-4 bg-gray-100 rounded border mt-4">
            <h3 class="font-semibold mb-2">Result</h3>
            <p><?php echo e($result); ?></p>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div><?php /**PATH F:\projects\smile-organization\resources\views\livewire\ai\text-generator.blade.php ENDPATH**/ ?>