<div class="w-full bg-gray-100 shadow-md h-16 rounded-lg flex items-center">
    <div class="max-w-7xl mx-auto flex w-full items-center justify-between px-6">
        
        <div class="flex items-center">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('navigation-logo-header', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-128465916-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>

        
        <div class="text-right text-black">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $footers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p class="text-sm md:text-base ">
                    © <?php echo e(date('Y')); ?> <?php echo e($footer->footer_text); ?>

                </p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>
</div><?php /**PATH /Users/madebykush/Desktop/Dev folders/Roundi stores/e-commerce-cart/resources/views/livewire/site-footer.blade.php ENDPATH**/ ?>