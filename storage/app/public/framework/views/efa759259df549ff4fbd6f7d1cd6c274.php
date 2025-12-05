<div class="mx-auto max-w-10xl">

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('store-card', ['storeName' => $store->name ?? 'Store Name','description' => $store->description ?? 'Discover delicious Thai dishes like Pad Thai and Red Curry from Siam Thai Kitchen! Perfect for takeout lovers!','website' => $store->website ?? null,'phone' => $store->phone ?? null,'address' => $store->address ?? null,'weekdayHours' => $store->weekday_hours ?? '9:00 AM - 9:00 PM','weekendHours' => $store->weekend_hours ?? '10:00 AM - 11:00 PM','logo' => $store->logo_url ?? null,'banner' => $store->banner_url ?? null]);

$__html = app('livewire')->mount($__name, $__params, 'lw-582778001-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <!-- ✅ Responsive Navbar -->
    <nav class="bg-white shadow-md sticky top-2 z-50  rounded-lg">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Left: Logo -->
                <div class="flex-shrink-0">
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('navigation-logo-header', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-582778001-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                </div>

                <!-- Center: Categories (hidden on small screens, show as dropdown later if needed) -->
                <nav class=" flex w-auto shrink sm:mr-auto max-sm:order-2">

                    <div class="hidden sm:block">
                        <ul class="flex flex-row items-center gap-x-8">
                            <li>
                                <button wire:click="setCategory(null)"
                                    class="<?php echo e(!$selectedCategory); ?>

                            inline-flex h-9 w-max items-center justify-center rounded-md px-4 py-2 text-sm font-medium transition-colors hover:bg-gray-200 hover:text-foreground focus:outline-none text-foreground/70">


                                    All
                                </button>
                            </li>

                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <button wire:click="setCategory('<?php echo e($category->slug); ?>')"
                                        class="<?php echo e($selectedCategory === $category->slug); ?>

                                inline-flex h-9 w-max items-center justify-center rounded-md px-4 py-2 text-sm font-medium transition-colors hover:bg-gray-200 hover:text-foreground focus:outline-none text-foreground/70">
                                        <?php echo e($category->name); ?>

                                    </button>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                        </ul>
                    </div>
                </nav>

                <!-- Right: Search + Cart -->
                <div class="flex items-center gap-4">
                    <!-- Search -->
                    <div class="relative">
                        <div class="relative">
                            <!-- Search button (left) -->
                            <button wire:click="search"
                                class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-500 hover:text-black">
                                🔍
                            </button>

                            <!-- Search input (placeholder aligned right) -->
                            <input type="text" wire:model.live="searchTerm" placeholder="Search..."
                                class="w-32 sm:w-48 lg:w-72 border rounded-lg px-4 lg:py-2 py-1 focus:outline-none focus:ring-2 focus:ring-green-500 text-right placeholder:text-right" />
                        </div>

                    </div>
                    <!-- Cart Button -->
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('cart_button', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-582778001-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                    <div class="z-60 fixed top-2 right-6">
                        <!-- Modal Version (PRIMARY) -->
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('hybrid-cart', ['view' => 'modal','isPrimary' => true,'class' => ' absolute top-full right-0 mt-2 w-72 sm:w-96 bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden']);

$__html = app('livewire')->mount($__name, $__params, 'lw-582778001-3', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

                        <!-- Drawer Version (SECONDARY) -->
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('hybrid-cart', ['view' => 'drawer','isPrimary' => false,'class' => ' fixed top-0 right-0 h-full w-full sm:w-[28rem] bg-blue-700 shadow-xl transform transition-transform duration-300']);

$__html = app('livewire')->mount($__name, $__params, 'lw-582778001-4', $__slots ?? [], get_defined_vars());

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

            <!-- Mobile Categories -->
            <div class="flex md:hidden justify-center flex-wrap gap-2 mt-3">
                <button wire:click="setCategory(null)"
                    class="<?php echo e(!$selectedCategory ? 'bg-black text-white' : 'bg-green-600 hover:bg-green-300'); ?>

                        px-4 py-2 rounded-full text-sm font-medium transition">
                    All
                </button>

                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button wire:click="setCategory('<?php echo e($category->slug); ?>')"
                        class="<?php echo e($selectedCategory === $category->slug ? 'bg-black text-white' : 'bg-green-600 hover:bg-green-300'); ?>

                            px-4 py-2 rounded-full text-sm font-medium transition">
                        <?php echo e($category->name); ?>

                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </nav>







    <!-- ✅ Existing Content -->
    <div class="container mx-auto py-12 -mt-12 px-4 sm:px-6 lg:px-8">
        <!-- Products Grid -->

        <div class="mt-12">
            <ul class="grid grid-cols-6 gap-6">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('product-card', ['product' => $product]);

$__html = app('livewire')->mount($__name, $__params, 'product-' . $product->id, $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </ul>
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            <?php echo e($products->links()); ?>

        </div>
    </div>
    <!-- Floating Cart Button -->
    <div class="fixed top-20 right-6 z-50 hidden">
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('hybrid-cart', ['view' => 'modal','isPrimary' => false]);

$__html = app('livewire')->mount($__name, $__params, 'lw-582778001-5', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <livewire:hybrid-cart view= "drawer" :isPrimary="false" />
    </div>

</div>





















</div>

<?php /**PATH /Users/madebykush/Desktop/Dev folders/accessory-page-clone/burner-supply-app/resources/views/livewire/home-page.blade.php ENDPATH**/ ?>
