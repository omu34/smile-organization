<div class="mx-auto w-full flex items-center justify-center text-center">
    <!--[if BLOCK]><![endif]--><?php if($slider && $slider->slides->count()): ?>
        <div class="swiper mySwiper  rounded-md overflow-hidden h-auto md:h-[400px]">
            <div class="swiper-wrapper">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $slider->slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide opacity-25  bg-cover bg-center relative flex items-center justify-center rounded-md" style="background-image: url('<?php echo e($slide->full_image_url); ?>')">
                        
                        <div class="absolute inset-0 bg-black/40 rounded-md "></div>

                        
                        <div
                            class="relative justify-content-center items-center z-10  md:mt-20  p-4 md:p-6 rounded-md text-center text-white max-w-lg mx-auto shadow-xl">
                            <h2 class="text-xl md:text-2xl font-semibold mb-2 ">

                                
                                <?php echo e($slide->title); ?>

                            </h2>

                            <!--[if BLOCK]><![endif]--><?php if($slide->description): ?>
                                <p class="text-sm md:text-base mb-3 opacity-90">
                                    <?php echo e(Str::limit($slide->description, 80)); ?>

                                </p>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                            <!--[if BLOCK]><![endif]--><?php if($slide->button_text): ?>
                                <a href="<?php echo e($slide->button_link ?? '#'); ?>"
                                    class="inline-block bg-emerald-500 hover:bg-emerald-600 text-white font-semibold text-sm px-4 py-2 rounded-md transition duration-300">
                                    <?php echo e($slide->button_text); ?>

                                </a>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            
            <div class="swiper-pagination !bottom-2"></div>
        </div>
    <?php else: ?>
        <div class="w-full h-full flex items-center justify-center text-gray-500">
            <p>No slider found for slug: <strong><?php echo e($slug); ?></strong></p>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH C:\Users\Rygss\Downloads\smile-organization\resources\views/livewire/slider-show.blade.php ENDPATH**/ ?>