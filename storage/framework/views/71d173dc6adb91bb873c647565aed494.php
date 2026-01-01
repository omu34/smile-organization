<div class="container mx-auto px-4 py-8 hidden md:block">

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($areaTitle): ?>
            <div class="flex justify-start item-1 -mb-8 md:justify-center items-center flex-col md:py-2">
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
    <div class="area-carousel-wrapper h-[200px] md:h-[400px] lg:h-[600px] relative">
        
        <div class="area-carousel w-full h-full relative">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $areas_of_practices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    // Calculate rotation dynamically
                    $total = count($areas_of_practices);
                    $angle = $total > 0 ? (360 / $total) * $index : 0;
                ?>
                <div class="area-carousel-item w-[90px] sm:w-[190px] lg:w-[250px] h-[120px] sm:h-[1900px] lg:h-[250px] transition-transform duration-300"
                    style="--rotateY: <?php echo e($angle); ?>deg">
                    <div
                        class="bg-gray-50 hover:bg-gray-300 hover:text-white rounded shadow-md p-4 text-center transform transition-transform duration-300 hover:translate-z-20">
                        <h3 class="text-[#d13642] mb-1"><?php echo e($area->subtitle); ?></h3>
                        <a href="<?php echo e($area->url); ?>" target="_blank" class="text-[#d13642] hover:text-red-400">
                            <?php echo e($area->button_name); ?> &#8594;
                        </a>
                        <img src="<?php echo e($area->full_image_path); ?>" alt="<?php echo e($area->subtitle); ?>"
                            class="mt-2 rounded w-full h-auto" />
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-gray-400">No active areas of practice found.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Bernard O\Downloads\herd-projects\smile-with-ai\resources\views/livewire/area-of-practice.blade.php ENDPATH**/ ?>