<div data-aos="fade-up" data-aos-duration="1000">
    <section class="pt-20 pb-5 mx-auto " id="our-resources">
        <div class="w-full px-4">
            <div class="max-w-6xl  mx-auto text-center">
                <h2 class="text-3xl font-bold mb-6">Our Resources</h2>
                
                <p class="text-md text-black leading-relaxed  max-w-md  mx-auto">
                    SFN resources include advocacy tools, psychosocial support for caregivers, educational materials,
                    recreational activities, access to affordable therapies, and community-driven initiatives.
                </p>
                

            </div>

            <section class="w-full mx-auto py-10 bg-white rounded-xl px-6 space-y-12">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

                            <!--[if BLOCK]><![endif]--><?php if($resource->extra_description): ?>
                                <p class="text-gray-700 leading-relaxed mt-3"><?php echo e($resource->extra_description); ?></p>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </section>
        </div>
    </section>
</div>
<?php /**PATH C:\Users\Rygss\Downloads\smile-organization\resources\views/livewire/resource-section.blade.php ENDPATH**/ ?>