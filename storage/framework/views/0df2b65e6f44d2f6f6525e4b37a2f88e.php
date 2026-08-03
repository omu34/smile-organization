<section class="bg-white py-16 lg:py-24" data-aos="fade-up" data-aos-duration="1000">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="flex flex-col items-center md:items-start text-center md:text-left mb-16">
            <!-- Red Accent Line -->
            <div class="hidden md:block h-1 w-16 bg-red-600 mb-4"></div>
            
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight mb-4 uppercase">
                Why Choose Us
            </h2>
            
            <h4 class="text-lg md:text-xl text-gray-600 max-w-2xl font-medium">
                We serve the entire community without bias
            </h4>
        </div>

        <!-- Why Us Grid -->
        <div id="whyUsGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $whyUsItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 p-8 flex flex-col items-center text-center relative overflow-hidden group">
                    <!-- Top Accent Line (Shifts from dark to Arsenal red on hover) -->
                    <div class="absolute top-0 left-0 w-full h-1 bg-gray-900 group-hover:bg-red-600 transition-colors duration-300"></div>

                    <!-- Image Wrapper -->
                    <?php ($whyUsImage = $item->getFirstMediaUrl('why_us_images') ?? $item->full_image_url); ?>
                    <div class="relative p-1 rounded-full border-2 border-gray-200 group-hover:border-red-600 transition-colors duration-300 mb-6">
                        <img src="<?php echo e($whyUsImage); ?>"
                             class="rounded-full h-24 w-24 object-cover shadow-sm" alt="<?php echo e($item->title); ?>">
                    </div>

                    <!-- Content -->
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-red-600 transition-colors">
                        <?php echo e($item->title); ?>

                    </h3>
                    
                    <p class="text-gray-600 text-sm leading-relaxed">
                        <?php echo e($item->description); ?>

                    </p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section><?php /**PATH F:\projects\smile-organization\resources\views/livewire/why-us-section.blade.php ENDPATH**/ ?>