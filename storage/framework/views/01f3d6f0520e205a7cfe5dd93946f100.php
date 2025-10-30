<section class="text-gray-700 body-font pt-10">
    <div class="mx-auto" data-aos="fade-up" data-aos-duration="1000">
        <div class="flex justify-center text-3xl font-bold text-[#000000] text-center mb-8">
            <h1>Why <span class="">Us?</span></h1>
        </div>

        <div class="container py-12 mx-auto">
            <div id="whyUsGrid" class="flex flex-wrap text-center md:text-left justify-center">
                <?php $__currentLoopData = $whyUsItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="p-4 md:w-1/4 sm:w-1/2">
                        <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                            <div class="flex justify-center">
                                <img src="<?php echo e($item->full_image_url); ?>" class="w-32 mb-3" alt="<?php echo e($item->title); ?>">
                            </div>
                            <h2 class="title-font font-regular text-xl text-black"><?php echo e($item->title); ?></h2>
                            <p class="mt-4 text-black text-md"><?php echo e($item->description); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section><?php /**PATH C:\Users\Rygss\Downloads\smile-organization\resources\views\livewire\why-us-section.blade.php ENDPATH**/ ?>