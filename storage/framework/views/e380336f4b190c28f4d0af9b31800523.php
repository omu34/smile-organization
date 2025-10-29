<footer class="bg-white text-black py-12 px-6 md:px-16 shadow-md shadow-emerald-200">
    <div class=" mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

        
        <div class="space-y-4 text-center sm:text-left">
            <!--[if BLOCK]><![endif]--><?php if($footerInfo): ?>

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
                
                <p class="leading-relaxed text-gray-700">
                    <?php echo e($footerInfo->description ?? ''); ?>

                </p>

                <div class="mt-4 space-y-2 text-gray-700">
                    <!--[if BLOCK]><![endif]--><?php if($footerInfo->address): ?>
                        <p><strong>Address:</strong> <?php echo e($footerInfo->address); ?></p>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]--><?php if($footerInfo->phone): ?>
                        <p><strong>Phone:</strong> <?php echo e($footerInfo->phone); ?></p>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]--><?php if($footerInfo->email): ?>
                        <p><strong>Email:</strong> <?php echo e($footerInfo->email); ?></p>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            <?php else: ?>
                <p>Footer info not available.</p>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        
        <div class="bg-black text-white rounded-xl p-6 text-center flex flex-col items-center justify-center">
            <!--[if BLOCK]><![endif]--><?php if($footerCta): ?>
                <h3 class="text-lg font-semibold mb-2"><?php echo e($footerCta->title ?? 'Stay Connected'); ?></h3>
                <p class="mb-4 text-gray-300"><?php echo e($footerCta->subtitle ?? 'Join our newsletter for updates.'); ?></p>

                <!--[if BLOCK]><![endif]--><?php if($footerCta->button_text && $footerCta->button_link): ?>
                    <a href="<?php echo e($footerCta->button_link); ?>"
                       class="bg-white text-black px-6 py-2 rounded-lg font-medium hover:bg-gray-700 hover:text-white transition duration-200">
                        <?php echo e($footerCta->button_text); ?>

                    </a>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <?php else: ?>
                <p>CTA not configured.</p>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        
        <div class="space-y-4 text-center sm:text-left">
            <h2 class="text-xl font-semibold">Follow Us</h2>
            <div wire:poll.30s="loadFooterData"
                 class="flex flex-wrap justify-center sm:justify-start gap-4">
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $socialLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <a href="<?php echo e($link->url); ?>"
                       target="_blank"
                       title="<?php echo e($link->platform_name); ?>"
                       class="transition-transform hover:scale-110">
                        <!--[if BLOCK]><![endif]--><?php if($link->image_path): ?>
                            <img src="<?php echo e(asset('storage/' . $link->image_path)); ?>"
                                 alt="<?php echo e($link->platform_name); ?>"
                                 class="w-8 h-8 object-contain rounded-md">
                        <?php else: ?>
                            <div class="w-8 h-8 bg-black rounded-md flex items-center justify-center">
                                <span class="text-xs text-white font-semibold">
                                    <?php echo e(strtoupper(substr($link->platform_name, 0, 1))); ?>

                                </span>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p>No social links available.</p>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>

    
    <div class="text-center mt-12 text-sm text-gray-700 border-t border-gray-300 pt-6">
        <p>&copy; <?php echo e(date('Y')); ?> <?php echo e($footerInfo->company_name ?? 'Your Company'); ?>. All rights reserved.</p>
    </div>
</footer>

<?php /**PATH C:\Users\Rygss\Downloads\smile-organization\resources\views/livewire/footer-section.blade.php ENDPATH**/ ?>