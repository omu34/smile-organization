<div class="">
    <?php if (isset($component)) { $__componentOriginal02bc6b20a38cf06c9184b6174ebbb71f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal02bc6b20a38cf06c9184b6174ebbb71f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.homepage.product-card','data' => ['product' => $product]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('homepage.product-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['product' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal02bc6b20a38cf06c9184b6174ebbb71f)): ?>
<?php $attributes = $__attributesOriginal02bc6b20a38cf06c9184b6174ebbb71f; ?>
<?php unset($__attributesOriginal02bc6b20a38cf06c9184b6174ebbb71f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal02bc6b20a38cf06c9184b6174ebbb71f)): ?>
<?php $component = $__componentOriginal02bc6b20a38cf06c9184b6174ebbb71f; ?>
<?php unset($__componentOriginal02bc6b20a38cf06c9184b6174ebbb71f); ?>
<?php endif; ?>    
</div><?php /**PATH /Users/madebykush/Desktop/Dev folders/e-commerce-cart/resources/views/livewire/product-card.blade.php ENDPATH**/ ?>