<?php if (isset($component)) { $__componentOriginal166a02a7c5ef5a9331faf66fa665c256 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal166a02a7c5ef5a9331faf66fa665c256 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-panels::components.page.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament-panels::page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Chat -->
        <div class="p-4 border rounded bg-white">
            <h2 class="text-lg font-semibold mb-2">Ask Anything (Chat)</h2>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('ask-anything', []);

$__key = null;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-784524848-1', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>

        <!-- Image -->
        <div class="p-4 border rounded bg-white">
            <h2 class="text-lg font-semibold mb-2">Generate Image</h2>

            <form wire:submit.prevent="generateImage">
                <div class="mb-2">
                    <label class="text-sm">Prompt</label>
                    <textarea class="w-full border rounded p-2" rows="3" wire:model.defer="prompt"
                        placeholder="A futuristic city skyline at sunset..."></textarea>
                </div>
                <div class="mb-2">
                    <label class="text-sm">Size</label>
                    <select class="border rounded px-2 py-1" wire:model="size">
                        <option>512x512</option>
                        <option selected>1024x1024</option>
                        <option>2048x2048</option>
                    </select>
                </div>
                <button type="submit" class="bg-emerald-600 text-white px-3 py-2 rounded">Generate</button>
            </form>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($imageUrl): ?>
                <div class="mt-4">
                    <img src="<?php echo e($imageUrl); ?>" class="rounded border" alt="Generated imagev">
                </div>
                
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal166a02a7c5ef5a9331faf66fa665c256)): ?>
<?php $attributes = $__attributesOriginal166a02a7c5ef5a9331faf66fa665c256; ?>
<?php unset($__attributesOriginal166a02a7c5ef5a9331faf66fa665c256); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal166a02a7c5ef5a9331faf66fa665c256)): ?>
<?php $component = $__componentOriginal166a02a7c5ef5a9331faf66fa665c256; ?>
<?php unset($__componentOriginal166a02a7c5ef5a9331faf66fa665c256); ?>
<?php endif; ?><?php /**PATH F:\projects\smile-organization\resources\views\livewire\filament\pages\ai-assistant.blade.php ENDPATH**/ ?>