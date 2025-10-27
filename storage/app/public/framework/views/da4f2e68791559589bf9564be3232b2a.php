<div class="mx-auto  bg-gray-100 shadow-md h-16 rounded-lg flex items-center">
    <?php if (isset($component)) { $__componentOriginal19a76a4ce94f0288e6ccda129ca5afbf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal19a76a4ce94f0288e6ccda129ca5afbf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.homepage.site-footer','data' => ['footers' => $footers]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('homepage.site-footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['footers' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($footers)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal19a76a4ce94f0288e6ccda129ca5afbf)): ?>
<?php $attributes = $__attributesOriginal19a76a4ce94f0288e6ccda129ca5afbf; ?>
<?php unset($__attributesOriginal19a76a4ce94f0288e6ccda129ca5afbf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal19a76a4ce94f0288e6ccda129ca5afbf)): ?>
<?php $component = $__componentOriginal19a76a4ce94f0288e6ccda129ca5afbf; ?>
<?php unset($__componentOriginal19a76a4ce94f0288e6ccda129ca5afbf); ?>
<?php endif; ?>
</div><?php /**PATH /Users/madebykush/Desktop/Dev folders/e-commerce-cart/resources/views/livewire/site-footer.blade.php ENDPATH**/ ?>