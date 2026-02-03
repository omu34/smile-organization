<!-- Areas of practice  -->
<div>
    <div data-aos="fade-up" data-aos-duration="1000" class="block sm:hidden md:block mb-2 mt-4 md:mt-16 bg-white">
        <div class=" ml-2 mr-2">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($areaTitle): ?>
                <div class="flex justify-start item-1 md:justify-center items-center flex-col md:py-4">
                    <h2
                        class="font-bold text-xl md:text-3xl leading-tight mb-2 text-[#d13642]  rounded-md border-b-2 border-red-800 text-center md:text-left">
                        <?php echo e($areaTitle->title); ?>

                        
                    </h2>
                    <h4
                        class="sm:text-lg md:text-xl  text-lg  font-medium text-gray-800 mt-4 tracking-wide  mx-auto max-w-lg ml-4 mr-4 md:ml-0 md:mr-0 text-center">
                        <?php echo e($areaTitle->description); ?>


                    </h4>
                </div>
            <?php else: ?>
                <p class="text-gray-500 dark:text-gray-400">Area of Practice info not available.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <div>
                <div wire:poll.30s="loadAreasOfPractices"
                    class="h-screen-1/2 w-full flex items-center justify-center overflow-hidden md:ml-0 ml-1 ">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $areas_of_practices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="  relative lg:w-[280px] lg:h-[280px] sm:w-[220px] sm:h-[220px] w-[120px] h-[150px] [transform-style:preserve-3d] animate-[rotate_100s_linear_infinite]"
                            style="animation: rotate 100s linear infinite">
                            <span style="--i: 1"
                                class="absolute top-0 left-0 w-full h-full origin-center [transform-style:preserve-3d] lg:[transform:rotateY(calc(var(--i)*45deg))_translateZ(350px)] md:[transform:rotateY(calc(var(--i)*45deg))_translateZ(265px)] sm:[transform:rotateY(calc(var(--i)*45deg))_translateZ(216px)] [transform:rotateY(calc(var(--i)*45deg))_translateZ(150px)]">
                                <div
                                    class="bg-gray-50 hover:bg-gray-300 hover:text-white mt-8 md:mt-9 transition duration-300 max-w-xs sm:max-w-sm md:max-w-md lg:max-w-xl rounded overflow-hidden shadow-md">
                                    <div class="py-4 px-4 sm:px-6 md:px-8 pb-4 md:mt-0 -mt-4">
                                        <a href="procurement.html">
                                            <h3 class="mb-0.5  text-[#d13642]">
                                                <?php echo e($area->subtitle); ?>

                                            </h3>

                                            <a href="<?php echo e($area->url); ?>" target="_blank" 
                                                class="text-[#d13642] hover:text-red-400  bell-italic">
                                                <?php echo e($area->button_name); ?>

                                                <span class="ml-0.5">&#8594;</span>
                                            </a>
                                            <!-- For Larger Screens: Show bigger image -->
                                            <div class="block">
                                                <img src="<?php echo e($area->full_image_path); ?>" class="md:w-48 w-32 rounded-md"
                                                    alt="<?php echo e($area->subtitle); ?>" />
                                                <hr class="mt-1" />
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </span>
                            <!-- Repeat similar structure for other spans -->
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-gray-400">No active social links found.</p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Rygss\Downloads\smile-with-ai\resources\views/livewire/area-of-practice.blade.php ENDPATH**/ ?>