<div class="m-4">
    <div class="max-w-7xl mx-auto  flex items-start justify-between mt-4">
        <div class="w-full lg:w-2/3">
            
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('navigation-logo-header', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1740015262-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

            
            <h1 class="text-2xl font-bold text-gray-900">
                <?php echo e($header->shop_name); ?>

            </h1>

            <p class="text-lg text-gray-700 mt-1">
                <?php echo e($header->welcome_text); ?>

            </p>

            <!--[if BLOCK]><![endif]--><?php if($header->description): ?>
                <p class="text-gray-600 mt-1">
                    <?php echo e($header->description); ?>

                </p>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <div class="grid grid-cols-1 gap-2 mt-4">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $header->contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center gap-2">
                        <a href="<?php echo e($contact->href); ?>" class="flex items-center gap-2 hover:underline" target="<?php echo e($contact->type === 'https' ? '_blank' : '_self'); ?>" rel="noopener">
                            <!--[if BLOCK]><![endif]--><?php if($contact->icon_url): ?>
                                <img src="<?php echo e($contact->icon_url); ?>" alt="<?php echo e($contact->label); ?> icon" class="w-8 h-8 object-contain" />
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <span class="p-2 rounded text-sm"><?php echo e($contact->label); ?></span>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>

        
        <div class="ml-6 mt-2">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('cart_button', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1740015262-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            <div class="z-60 fixed top-2 right-6">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('hybrid-cart', ['view' => 'modal','isPrimary' => true,'class' => 'absolute top-full right-0 mt-2 w-72 sm:w-96 bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden']);

$__html = app('livewire')->mount($__name, $__params, 'lw-1740015262-2', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('hybrid-cart', ['view' => 'drawer','isPrimary' => false,'class' => 'fixed top-0 right-0 h-full w-full sm:w-[28rem] bg-blue-700 shadow-xl transform transition-transform duration-300']);

$__html = app('livewire')->mount($__name, $__params, 'lw-1740015262-3', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>
        </div>
    </div>
</div><?php /**PATH /Users/madebykush/Desktop/Dev folders/Roundi stores/e-commerce-cart/resources/views/livewire/header-component.blade.php ENDPATH**/ ?>