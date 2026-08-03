<div class="bg-white py-16 lg:py-24" data-aos="fade-up" data-aos-duration="1000">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="beneficiaries">
        
        <!-- Section Header -->
        <div class="flex flex-col items-center md:items-start text-center md:text-left mb-12">
            <!-- Red Accent Line -->
            <div class="hidden md:block h-1 w-16 bg-red-600 mb-4"></div>
            
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight mb-4 uppercase">
                Beneficiaries
            </h2>
            
            <h4 class="text-lg md:text-xl text-gray-600 max-w-2xl font-medium">
                Welcome
            </h4>
        </div>

        <!-- Beneficiaries Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $beneficiaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article wire:key="beneficiary-<?php echo e($item->id); ?>" class="bg-white rounded-xl shadow-sm hover:shadow-xl border border-gray-100 overflow-hidden flex flex-col group transition-all duration-300">
                    
                    <!-- Card Image -->
                    <?php ($beneficiaryImage = $item->getFirstMediaUrl('beneficiary_images') ?? $item->full_image_path); ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($beneficiaryImage): ?>
                        <div class="relative w-full aspect-video overflow-hidden bg-gray-200">
                            <img src="<?php echo e($beneficiaryImage); ?>" 
                                 alt="<?php echo e($item->title); ?>"
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <!-- Card Body -->
                    <div class="p-6 flex flex-col flex-grow">
                        <!-- Date Meta Tag -->
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->published_at): ?>
                            <div class="mb-3">
                                <span class="text-xs font-bold uppercase tracking-wider text-red-600">
                                    <?php echo e($item->published_at->format('M d, Y')); ?>

                                </span>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <!-- Title -->
                        <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight group-hover:text-red-600 transition-colors">
                            <a href="javascript:void(0)" class="focus:outline-none">
                                <?php echo e($item->title); ?>

                            </a>
                        </h3>

                        <!-- Description -->
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->description): ?>
                            <p class="text-gray-600 text-base leading-relaxed mb-6 flex-grow line-clamp-3">
                                <?php echo e($item->description); ?>

                            </p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

    </div>
</div><?php /**PATH F:\projects\smile-organization\resources\views/livewire/beneficiary-section.blade.php ENDPATH**/ ?>