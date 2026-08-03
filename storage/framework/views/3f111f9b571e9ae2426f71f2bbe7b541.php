<section class="bg-white py-16 lg:py-24" id="our-resources" data-aos="fade-up" data-aos-duration="1000">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="flex flex-col items-center md:items-start text-center md:text-left mb-16">
            <!-- Red Accent Line -->
            <div class="hidden md:block h-1 w-16 bg-red-600 mb-4"></div>
            
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight mb-4 uppercase">
                Our Resources
            </h2>
            
            <h4 class="text-lg md:text-xl text-gray-600 max-w-2xl font-medium">
                Welcome
            </h4>
        </div>

        <!-- Resources List -->
        <div class="space-y-16">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex flex-col md:flex-row items-center gap-12 <?php echo e($resource->alignment === 'right' ? 'md:flex-row-reverse' : ''); ?> bg-white rounded-2xl p-6 md:p-8 border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300">
                    
                    
                    <div data-aos="<?php echo e($resource->alignment === 'left' ? 'flip-left' : 'flip-right'); ?>"
                        class="w-full md:w-1/2 flex-shrink-0 overflow-hidden rounded-xl shadow-md group">
                        <img src="<?php echo e($resource->full_image_path); ?>" alt="<?php echo e($resource->title); ?>"
                            class="w-full h-64 md:h-80 object-cover rounded-xl transition-transform duration-700 group-hover:scale-105">
                    </div>

                    
                    <div class="w-full md:w-1/2 text-left flex flex-col justify-center space-y-4">
                        <div class="h-1 w-12 bg-red-600 rounded-full"></div>
                        
                        <h3 class="text-2xl md:text-3xl font-extrabold text-gray-900 tracking-tight leading-tight">
                            <?php echo e($resource->title); ?>

                        </h3>
                        
                        <p class="text-gray-600 text-base leading-relaxed font-normal">
                            <?php echo e($resource->description); ?>

                        </p>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($resource->extra_description): ?>
                            <p class="text-gray-600 text-base leading-relaxed font-normal pt-2 border-t border-gray-100">
                                <?php echo e($resource->extra_description); ?>

                            </p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section><?php /**PATH F:\projects\smile-organization\resources\views\livewire\resource-section.blade.php ENDPATH**/ ?>