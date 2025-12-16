<div data-aos="fade-up" data-aos-duration="1000">
    <div class="pt-20 pb-5 mx-auto " id="our-resources">
        <div class="mx-auto px-4">
            <div class="max-w-6xl  mx-auto text-center">
                <h2 class="text-3xl font-bold mb-6">Our Resources</h2>
                
                <p class="text-md text-black leading-relaxed  max-w-md  mx-auto">
                    SFN resources include advocacy tools, psychosocial support for caregivers, educational materials,
                    recreational activities, access to affordable therapies, and community-driven initiatives.
                </p>
                

            </div>

            <div class="w-full mx-auto py-10 bg-white rounded-xl  space-y-12">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div
                        class="flex flex-col md:flex-row items-center gap-8
                        <?php echo e($resource->alignment === 'right' ? 'md:flex-row-reverse' : ''); ?>

                        max-w-6xl mx-auto">

                        
                        <div data-aos="<?php echo e($resource->alignment === 'left' ? 'flip-left' : 'flip-right'); ?>"
                            class="w-full md:w-1/2 flex-shrink-0">
                            <img src="<?php echo e($resource->full_image_path); ?>" alt="<?php echo e($resource->title); ?>"
                                class="w-full h-64 md:h-80 object-cover rounded-xl shadow-md transition-transform transform hover:scale-105">
                        </div>

                        
                        <div class="w-full md:w-1/2 bg-white text-left">
                            <h2 class="text-2xl font-semibold text-black mb-3"><?php echo e($resource->title); ?></h2>
                            <p class="text-gray-700 leading-relaxed"><?php echo e($resource->description); ?></p>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($resource->extra_description): ?>
                                <p class="text-gray-700 leading-relaxed mt-3"><?php echo e($resource->extra_description); ?></p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Rygss\Downloads\smile-with-ai\resources\views/livewire/resource-section.blade.php ENDPATH**/ ?>