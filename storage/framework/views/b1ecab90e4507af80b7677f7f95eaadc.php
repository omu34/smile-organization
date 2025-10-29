<section class="bg-white py-10 min-h-[250px]" id="section">
    <h2 class="text-3xl font-bold text-center mb-12">Our Activities</h2>
    <div class=" mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-6">

        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="backdrop bg-white bg-opacity-10 rounded-lg p-4 text-black border border-gray-300 shadow-lg">
                <div class="w-full mb-3 pb-3 border-b border-white">
                    <h3 class="text-xl font-semibold text-shadow"><?php echo e($activity->title); ?></h3>
                </div>

                <!--[if BLOCK]><![endif]--><?php if($activity->image): ?>
                    
                    <img src="<?php echo e(asset('storage/' . $activity->image)); ?>" alt="<?php echo e($activity->title); ?>"
                        class="w-full h-48 md:h-56 object-cover rounded mb-3">
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!--[if BLOCK]><![endif]--><?php if($activity->description): ?>
                    <p class="tracking-wide text-base text-shadow">
                        <?php echo e($activity->description); ?>

                    </p>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!--[if BLOCK]><![endif]--><?php if($activity->button_text): ?>
                    <a href="<?php echo e($activity->button_link ?? '#'); ?>">
                        <button
                            class="mt-3 w-full bg-gray-100 bg-opacity-0 border border-white px-3 py-2 rounded focus:ring-2 focus:ring-white hover:bg-opacity-10 text-lg">
                            <?php echo e($activity->button_text); ?>

                        </button>
                    </a>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</section>
<?php /**PATH C:\Users\Rygss\Downloads\smile-organization\resources\views/livewire/activities-section.blade.php ENDPATH**/ ?>