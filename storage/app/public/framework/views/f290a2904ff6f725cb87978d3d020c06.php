<!-- resources/views/livewire/header-component.blade.php -->
<?php
    $background = $background ?? \App\Models\BackgroundColors::first();
?>
<!--[if BLOCK]><![endif]--><?php if($background): ?>
    <header class=" shadow-sm border-b border-gray-200" style="background-color: <?php echo e($background->bg_color); ?>;">

        <?php
            $header = $header ?? \App\Models\Header::first();
        ?>

        <!--[if BLOCK]><![endif]--><?php if($header): ?>
            <div class="max-w-10xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="py-4 md:py-6">
                    <div class="flex flex-col md:flex-row md:items-start md:justify-between">

                        <div class="flex-1 mb-4 md:mb-0">
                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('navigation-logo-header', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2427755746-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                            <h1 class="text-xl md:text-3xl font-semibold text-black mb-2">
                                <?php echo e($header->shop_name); ?>

                            </h1>

                            <div class="flex items-center text-sm text-green-600 font-medium mb-3">
                                <span class="inline-block w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                <?php echo e($header->status_text); ?>

                            </div>

                            <p class="text-gray-700 text-sm mb-4 max-w-2xl">
                                <?php echo e($header->description); ?>

                            </p>

                            <!-- Contact Details -->
                            <div class="flex flex-col space-y-2 text-sm md:flex">
                                <!--[if BLOCK]><![endif]--><?php if($header->phone): ?>
                                    <div class="flex items-center text-gray-700">
                                        <!-- phone SVG -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="w-3 h-3 sm:w-4 sm:h-4 mr-1 sm:mr-2 text-gray-500 flex-shrink-0">
                                            <path
                                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 1 .7 2.81 2 2 0 0 1-.45 1.7L5.7 11.66a11 11 0 0 0 4.76 4.76l1.77-1.77a2 2 0 0 1 1.7-.45 12.84 12.84 0 0 1 2.81.7A2 2 0 0 1 22 16.92z">
                                            </path>
                                        </svg>
                                        <a href="tel:<?php echo e($header->phone); ?>" target="_blank"
                                            class="text-blue-950 hover:text-blue-950 transition-colors">
                                            <span><?php echo e($header->phone); ?></span>
                                        </a>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                <!--[if BLOCK]><![endif]--><?php if($header->website): ?>
                                    <div class="flex items-center">
                                        <!-- globe SVG -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="w-3 h-3 sm:w-4 sm:h-4 mr-1 sm:mr-2 text-gray-500 flex-shrink-0">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                                            <path d="M2 12h20"></path>
                                            <path d="M12 2a14.5 14.5 0 0 1 20 0 14.5 14.5 0 0 1-20 0"></path>
                                        </svg>
                                        <a href="<?php echo e($header->website); ?>" target="_blank"
                                            class="text-blue-500 hover:text-blue-700 transition-colors">
                                            <?php echo e($header->website); ?>

                                        </a>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                <!--[if BLOCK]><![endif]--><?php if($header->instagram): ?>
                                    <div class="flex items-center">
                                        <!-- instagram SVG -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="w-3 h-3 sm:w-4 sm:h-4 mr-1 sm:mr-2 text-gray-500 flex-shrink-0">
                                            <rect width="20" height="20" x="2" y="2" rx="5"
                                                ry="5"></rect>
                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                            <line x1="17.5" x2="17.5" y1="6.5" y2="6.5"></line>
                                        </svg>
                                        <a href="https://instagram.com/<?php echo e($header->instagram); ?>" target="_blank"
                                            class="text-pink-500 hover:text-pink-700 transition-colors">
                                            <?php echo e($header->instagram); ?>

                                        </a>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                <!--[if BLOCK]><![endif]--><?php if($header->address): ?>
                                    <div class="flex items-center text-gray-700">
                                        <!-- map SVG -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="w-3 h-3 sm:w-4 sm:h-4 mr-1 sm:mr-2 text-gray-500 flex-shrink-0">
                                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                        <a href="https://maps.app.goo.gl/BLYPeMqiqe3YxcUw7" target="_blank"
                                            class="text-blue-500 hover:text-blue-700 transition-colors">
                                            <span><?php echo e($header->address); ?></span>
                                        </a>

                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                        <!-- Floating Cart Wrapper -->
                        <div
                            class="fixed top-5 right-5 md:bottom-8 md:right-12 lg:right-60 z-50 flex flex-col items-end space-y-2">
                            <!-- Cart Button -->
                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('cart-button', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2427755746-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                            <!-- Hybrid Cart Components -->
                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('hybrid-cart', ['view' => 'modal','isPrimary' => true]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2427755746-2', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('hybrid-cart', ['view' => 'drawer','isPrimary' => false]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2427755746-3', $__slots ?? [], get_defined_vars());

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
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </header>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH /Users/madebykush/Desktop/Dev folders/e-commerce-cart/resources/views/components/homepage/header-component.blade.php ENDPATH**/ ?>
