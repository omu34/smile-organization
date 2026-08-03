<footer data-aos="fade-up" data-aos-duration="1000"
    class="bg-gray-900 text-white border-t-4 border-red-600 pt-16 pb-12 shadow-2xl">

    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-12">
        
        
        <div class="space-y-6 text-center md:text-left">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($footerInfo): ?>
                <div class="flex justify-center md:justify-start">
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('navigation-logo-header-component', []);

$__key = null;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2986404912-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                </div>

                <p class="leading-relaxed font-normal text-gray-300 text-base max-w-md">
                    <?php echo e($footerInfo->description); ?>

                </p>

                <div class="space-y-3 text-gray-400 text-sm">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($footerInfo->address): ?>
                        <p class="flex flex-col md:flex-row md:items-center">
                            <span class="font-bold uppercase tracking-wider text-white text-xs mb-1 md:mb-0 md:w-20">Address:</span>
                            <span class="text-gray-300"><?php echo e($footerInfo->address); ?></span>
                        </p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($footerInfo->phone): ?>
                        <p class="flex flex-col md:flex-row md:items-center">
                            <span class="font-bold uppercase tracking-wider text-white text-xs mb-1 md:mb-0 md:w-20">Phone:</span>
                            <a href="tel:<?php echo e($footerInfo->phone); ?>" class="text-gray-300 hover:text-red-500 transition-colors"><?php echo e($footerInfo->phone); ?></a>
                        </p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($footerInfo->email): ?>
                        <p class="flex flex-col md:flex-row md:items-center">
                            <span class="font-bold uppercase tracking-wider text-white text-xs mb-1 md:mb-0 md:w-20">Email:</span>
                            <a href="mailto:<?php echo e($footerInfo->email); ?>" class="text-gray-300 hover:text-red-500 transition-colors"><?php echo e($footerInfo->email); ?></a>
                        </p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

            <?php else: ?>
                <p class="text-gray-500">Footer info not available.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <div class="bg-gray-800 border border-gray-700/80 rounded-2xl p-8 flex flex-col justify-between text-center relative overflow-hidden group shadow-xl">
            <!-- Top Red Accent Line -->
            <div class="absolute top-0 left-0 w-full h-1 bg-red-600"></div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($footerCta): ?>
                <div>
                    <h3 class="text-2xl font-extrabold uppercase tracking-tight text-white mb-3">
                        <?php echo e($footerCta->title); ?>

                    </h3>

                    <p class="mb-8 text-gray-300 text-sm leading-relaxed max-w-sm mx-auto">
                        <?php echo e($footerCta->subtitle); ?>

                    </p>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($footerCta->button_text && $footerCta->button_link): ?>
                    <div class="mt-auto">
                        <a href="<?php echo e($footerCta->button_link); ?>"
                           class="inline-flex items-center justify-center w-full bg-red-600 text-white font-bold uppercase tracking-wider px-6 py-3.5 rounded-xl hover:bg-red-700 transition-all duration-300 shadow-lg hover:shadow-red-900/50 focus:outline-none focus:ring-2 focus:ring-red-500">
                            <?php echo e($footerCta->button_text); ?>

                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php else: ?>
                <p class="text-gray-400">CTA not configured.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <div class="space-y-6 text-center md:text-left">
            <h2 class="text-xl font-extrabold uppercase tracking-tight text-white border-l-4 border-red-600 pl-3">
                Follow Us
            </h2>

            <div wire:poll.30s="loadFooterData"
                 class="flex flex-wrap justify-center md:justify-start gap-4">

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $socialLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <a href="<?php echo e($link->url); ?>"
                       target="_blank" rel="noopener"
                       title="<?php echo e($link->platform_name); ?>"
                       class="transition-transform duration-300 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-red-500 rounded-lg">

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($link->image_path): ?>
                            <img src="<?php echo e(asset('storage/' . $link->image_path)); ?>"
                                 alt="<?php echo e($link->platform_name); ?>"
                                 class="w-10 h-10 object-contain rounded-lg bg-gray-800 border border-gray-700 p-1 shadow-sm transition-all duration-300">
                        <?php else: ?>
                            <div class="w-10 h-10 bg-gray-800 border border-gray-700 rounded-lg flex items-center justify-center shadow-sm hover:border-red-600 transition-all duration-300">
                                <span class="text-sm text-white font-bold uppercase">
                                    <?php echo e(substr($link->platform_name, 0, 1)); ?>

                                </span>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-gray-500 text-sm">No social links available.</p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            </div>
        </div>

    </div>

    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 mt-12 border-t border-gray-800 text-center text-xs font-bold uppercase tracking-wider text-gray-500">
        <p>&copy; <?php echo e(date('Y')); ?> <?php echo e($footerInfo->company_name ?? 'Your Company'); ?> — All rights reserved.</p>
    </div>

</footer><?php /**PATH F:\projects\smile-organization\resources\views/livewire/footer-section.blade.php ENDPATH**/ ?>