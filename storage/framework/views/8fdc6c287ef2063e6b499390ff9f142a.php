<div data-aos="fade-up" data-aos-duration="1000">
    <section class="py-16 pb-14 " id="beneficiaries">
        <div class="mx-auto  px-5">
            <div class="max-w-6xl  mx-auto text-center">
                <h2 class="text-3xl font-bold mb-3">Beneficiaries</h2>
                <p class="text-md text-black leading-relaxed  max-w-md  mx-auto">
                    Those whose lives have been transformed by SFN's support,
                    and individuals who have benefited from our programs and services.
                </p>
            </div>

            <div class="flex flex-wrap -mx-4 mt-10">
                <?php $__currentLoopData = $beneficiaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div wire:key="beneficiary-<?php echo e($item->id); ?>" class="w-full px-4 md:w-1/2 lg:w-1/3 mb-10">
                        <div class="mx-auto max-w-[370px] group hover:scale-105 transition-transform">
                            <div class="relative pb-6">

                                <img src="<?php echo e(asset('storage/' . $item->image_path)); ?>" alt="<?php echo e($item->title); ?>"
                                    class="w-full h-64 md:h-80 object-cover rounded-xl shadow-md transition-transform transform hover:scale-105">
                            </div>
                            <div>
                                <span class=" mb-5 inline-block rounded py-1 px-4 text-xs font-semibold text-black">
                                    <?php echo e($item->published_at?->format('M d, Y')); ?>

                                </span>
                                <h3>
                                    <a href="javascript:void(0)"
                                        class="text-dark hover:text-primary mb-4 inline-block text-xl font-semibold">
                                        <?php echo e($item->title); ?>

                                    </a>
                                </h3>
                                <p class="text-base text-black">
                                    <?php echo e($item->description); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
</div><?php /**PATH C:\Users\Rygss\Downloads\smile-organization\resources\views\livewire\beneficiary-section.blade.php ENDPATH**/ ?>