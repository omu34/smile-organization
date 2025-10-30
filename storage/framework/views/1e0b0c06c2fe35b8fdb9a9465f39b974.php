<section class="py-10 mx-auto " id="partners">
    <div class="text-center mb-10">
        <h1 class="text-black text-3xl font-bold mb-6">
            Smile for Neuro-Diversity Partners
        </h1>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
        <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div data-aos="flip-left" class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                <a href="<?php echo e($partner->website_url); ?>" target="_blank">
                    <img src="<?php echo e($partner->full_logo); ?>"
                         class="rounded-full h-24 w-24 mx-auto mb-4 object-cover" alt="<?php echo e($partner->name); ?>">
                    <h3 class="text-center text-black font-semibold text-lg mb-2"><?php echo e($partner->name); ?></h3>
                </a>
                <p class="text-gray-800 text-sm mb-3 text-center">
                    "<?php echo e($partner->testimonial); ?>"
                </p>
                <div class="flex justify-center items-center space-x-1 text-gray-800">
                    <?php for($i = 0; $i < $partner->rating; $i++): ?>
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-s-star'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 fill-current']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                    <?php endfor; ?>
                    <span class="text-gray-800 text-sm ml-2">
                        <?php echo e($partner->rating); ?>/5 (<?php echo e($partner->reviews_count); ?> reviews)
                    </span>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section><?php /**PATH C:\Users\Rygss\Downloads\smile-organization\resources\views\livewire\partners-section.blade.php ENDPATH**/ ?>