<?php $__env->startSection('content'); ?>
<div accesskey="" class="">
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('home-page', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2328501320-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('site-footer', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2328501320-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('components.layouts.page-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/madebykush/Desktop/Dev folders/e-commerce-cart/resources/views/pages/home.blade.php ENDPATH**/ ?>