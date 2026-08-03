<section class="bg-gray-50/50 py-16 lg:py-24" data-aos="fade-up" data-aos-duration="1000">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($areaTitle): ?>
            <div class="flex flex-col items-center md:items-start text-center md:text-left mb-12 lg:mb-16">
                <!-- Red Accent Line -->
                <div class="hidden md:block h-1 w-16 bg-red-600 mb-6 rounded-full"></div>
                
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight mb-4 uppercase">
                    <?php echo e($areaTitle->title); ?>

                </h2>
                
                <p class="text-lg md:text-xl text-gray-600 max-w-2xl font-medium leading-relaxed">
                    <?php echo e($areaTitle->description); ?>

                </p>
            </div>
        <?php else: ?>
            <div class="mb-12">
                <p class="text-sm font-bold uppercase tracking-wider text-gray-400 border-l-4 border-gray-300 pl-3">
                    Area of Practice info not available.
                </p>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <!-- Modern CSS Grid Layout (Replaces the unprofessional 3D Carousel) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $areas_of_practices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <!-- Premium Interactive Card -->
                <a href="<?php echo e($area->url); ?>" target="_blank" 
                   class="group flex flex-col bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden relative">
                    
                    <!-- Top Hover Accent -->
                    <div class="absolute top-0 left-0 w-full h-1 bg-transparent group-hover:bg-red-600 transition-colors duration-300 z-20"></div>

                    <!-- Image Container -->
                    <div class="relative h-56 w-full overflow-hidden bg-gray-100">
                        <!-- Subtle Overlay -->
                        <div class="absolute inset-0 bg-gray-900/10 group-hover:bg-gray-900/0 transition-colors duration-500 z-10"></div>
                        
                        <img src="<?php echo e($area->full_image_path); ?>" 
                             alt="<?php echo e($area->subtitle); ?>"
                             class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-105"
                             loading="lazy" />
                    </div>
                    
                    <!-- Card Content -->
                    <div class="p-6 flex flex-col flex-grow relative z-20 bg-white">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-red-600 transition-colors duration-300 mb-3 leading-snug line-clamp-2">
                            <?php echo e($area->subtitle); ?>

                        </h3>
                        
                        <!-- Pushes the button to the bottom if title lengths vary -->
                        <div class="mt-auto pt-4 flex items-center text-xs font-bold uppercase tracking-widest text-red-600">
                            <?php echo e($area->button_name ?? 'Learn More'); ?>

                            
                            <svg class="w-4 h-4 ml-2 transform transition-transform duration-300 group-hover:translate-x-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-full flex flex-col items-center justify-center py-20 bg-white rounded-2xl border border-dashed border-gray-200">
                    <svg class="w-12 h-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <p class="text-gray-500 font-bold uppercase tracking-widest text-sm">No active areas of practice found.</p>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        
    </div>
</section><?php /**PATH F:\projects\smile-organization\resources\views\livewire\area-of-practice.blade.php ENDPATH**/ ?>