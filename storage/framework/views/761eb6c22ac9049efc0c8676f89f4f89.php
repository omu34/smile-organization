<section class="bg-white py-10 min-h-[250px]" id="section" data-aos="fade-up" data-aos-duration="1000">
    
        <div class="flex justify-start item-1 md:justify-center items-center flex-col md:py-4">
                <h2
                    class="font-bold text-xl md:text-3xl leading-tight mb-2 text-[#d13642]  rounded-md border-b-2 border-red-800 text-center md:text-left">
                    Our Activities
                    
                </h2>
                <h4
                    class="sm:text-lg md:text-xl  text-lg  font-medium text-gray-800 mt-4 tracking-wide  mx-auto max-w-lg ml-4 mr-4 md:ml-0 md:mr-0 text-center">
                     We do and humanitarian Job
                    
                </h4>
            </div>
            
    <div class=" mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-6">

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="backdrop bg-white bg-opacity-10 rounded-lg p-4 text-black border border-gray-300 shadow-lg">
                <div class="w-full mb-3 pb-3 border-b border-white">
                    <h3 class="text-xl font-semibold text-shadow"><?php echo e($activity->subtitle); ?></h3>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activity->image): ?>
                    
                    <img src="<?php echo e($activity->full_image); ?>" alt="<?php echo e($activity->title); ?>" class="w-full h-48 md:h-56 object-cover rounded mb-3">
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activity->extra_description): ?>
                    <p class="tracking-wide text-base text-shadow">
                        <?php echo e($activity->extra_description); ?>

                    </p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activity->button_text): ?>
                    <a href="<?php echo e($activity->button_link ?? '#'); ?>">
                        <button
                            class="mt-3 w-full bg-gray-100 bg-opacity-0 border border-white px-3 py-2 rounded focus:ring-2 focus:ring-white hover:bg-opacity-10 text-lg">
                            <?php echo e($activity->button_text); ?>

                        </button>
                    </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</section>
<?php /**PATH C:\Users\Rygss\Downloads\smile-with-ai\resources\views/livewire/activities-section.blade.php ENDPATH**/ ?>