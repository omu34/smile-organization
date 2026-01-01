<section class="text-gray-700 body-font pt-10">
    <div class="mx-auto" data-aos="fade-up" data-aos-duration="1000">
        <div class="flex justify-center text-3xl font-bold text-[#000000] text-center mb-8">
            
        <div class="flex justify-start item-1 md:justify-center items-center flex-col md:py-4">
                <h2
                    class="font-bold text-xl md:text-3xl leading-tight mb-2 text-[#d13642]  rounded-md border-b-2 border-red-800 text-center md:text-left">
                    Why choose Us
                    
                </h2>
                <h4
                    class="sm:text-lg md:text-xl  text-lg  font-medium text-gray-800 mt-4 tracking-wide  mx-auto max-w-lg ml-4 mr-4 md:ml-0 md:mr-0 text-center">
                     We  serve the all community without Biasness
                    
                </h4>
            </div>
            
                
            
        </div>

        <div class="container py-12 mx-auto">
            <div id="whyUsGrid" class="flex flex-wrap text-center md:text-left justify-center">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $whyUsItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="p-4 md:w-1/4 sm:w-1/2">
                        <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                            <div class="flex justify-center">
                                <img src="<?php echo e($item->full_image_url); ?>"
                                    class="rounded-full h-24 w-24 mx-auto mb-4 object-cover" alt="<?php echo e($item->title); ?>">
                                
                            </div>
                            <h2 class="title-font font-regular text-xl text-black"><?php echo e($item->title); ?></h2>
                            <p class="mt-4 text-black text-md"><?php echo e($item->description); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\Users\Bernard O\Downloads\herd-projects\smile-with-ai\resources\views/livewire/why-us-section.blade.php ENDPATH**/ ?>