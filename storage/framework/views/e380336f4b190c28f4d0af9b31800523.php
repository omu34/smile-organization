<footer
    class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200 border-t border-gray-200 dark:border-gray-700 shadow-sm shadow-emerald-100/50 dark:shadow-emerald-900/20">

    
    <div class="mx-auto  px-6 sm:px-10 py-14 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">

        
        <div class="space-y-6 text-center sm:text-left">
            <!--[if BLOCK]><![endif]--><?php if($footerInfo): ?>
                <div class="flex justify-center sm:justify-start">
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('navigation-logo-header-component', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-497826083-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                </div>

                <p class="leading-relaxed font-medium text-gray-700 dark:text-gray-300 text-[15px]">
                    <?php echo e($footerInfo->description); ?>

                </p>

                <div class="space-y-2 text-gray-600 dark:text-gray-400 text-sm">
                    <!--[if BLOCK]><![endif]--><?php if($footerInfo->address): ?>
                        <p>
                            <span class="font-semibold text-gray-800 dark:text-gray-200">Address:</span>
                            <?php echo e($footerInfo->address); ?>

                        </p>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]--><?php if($footerInfo->phone): ?>
                        <p>
                            <span class="font-semibold text-gray-800 dark:text-gray-200">Phone:</span>
                            <?php echo e($footerInfo->phone); ?>

                        </p>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]--><?php if($footerInfo->email): ?>
                        <p>
                            <span class="font-semibold text-gray-800 dark:text-gray-200">Email:</span>
                            <?php echo e($footerInfo->email); ?>

                        </p>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>

            <?php else: ?>
                <p class="text-gray-500 dark:text-gray-400">Footer info not available.</p>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        
        <div
            class="bg-black dark:bg-emerald-700 text-white rounded-2xl p-8 flex flex-col items-center text-center shadow-inner shadow-emerald-900/30 hover:shadow-emerald-600/40 transition-all duration-300">

            <!--[if BLOCK]><![endif]--><?php if($footerCta): ?>
                <h3 class="text-2xl font-bold mb-2 tracking-tight">
                    <?php echo e($footerCta->title); ?>

                </h3>

                <p class="mb-6 text-gray-300 dark:text-gray-100/90 max-w-sm leading-relaxed">
                    <?php echo e($footerCta->subtitle); ?>

                </p>

                <!--[if BLOCK]><![endif]--><?php if($footerCta->button_text && $footerCta->button_link): ?>
                    <a href="<?php echo e($footerCta->button_link); ?>"
                       class="bg-white dark:bg-gray-900 text-black dark:text-white px-7 py-3 rounded-lg font-medium
                              hover:bg-emerald-600 hover:text-white dark:hover:bg-emerald-800 transition-all duration-300
                              shadow-md hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <?php echo e($footerCta->button_text); ?>

                    </a>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <?php else: ?>
                <p class="text-gray-400 dark:text-gray-200">CTA not configured.</p>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        
        <div class="space-y-6 text-center sm:text-left">
            <h2 class="text-xl font-bold tracking-tight text-gray-900 dark:text-gray-100">Follow Us</h2>

            <div wire:poll.30s="loadFooterData"
                 class="flex flex-wrap justify-center sm:justify-start gap-4">

                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $socialLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <a href="<?php echo e($link->url); ?>"
                       target="_blank" rel="noopener"
                       title="<?php echo e($link->platform_name); ?>"
                       class="transition-transform duration-300 hover:scale-110 hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-emerald-500 rounded-md">

                        <!--[if BLOCK]><![endif]--><?php if($link->image_path): ?>
                            <img src="<?php echo e(asset('storage/' . $link->image_path)); ?>"
                                 alt="<?php echo e($link->platform_name); ?>"
                                 class="w-10 h-10 object-contain rounded-md shadow-sm hover:shadow-md transition-all duration-300">
                        <?php else: ?>
                            <div
                                class="w-10 h-10 bg-black dark:bg-gray-800 rounded-md flex items-center justify-center shadow-sm hover:shadow-md transition-all duration-300">
                                <span class="text-sm text-white font-bold uppercase">
                                    <?php echo e(substr($link->platform_name, 0, 1)); ?>

                                </span>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-gray-500 dark:text-gray-400">No social links available.</p>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            </div>
        </div>

    </div>

    
    <div
        class="border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-950 text-center py-6 mt-6 text-sm text-gray-600 dark:text-gray-400">
        <p>&copy; <?php echo e(date('Y')); ?> <?php echo e($footerInfo->company_name ?? 'Your Company'); ?> — All rights reserved.</p>
    </div>

</footer>
<?php /**PATH C:\Users\Rygss\Downloads\smile-organization\resources\views/livewire/footer-section.blade.php ENDPATH**/ ?>