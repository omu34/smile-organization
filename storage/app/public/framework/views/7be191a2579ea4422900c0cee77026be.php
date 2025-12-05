<div class="min-h-screen bg-[#f8f9fa] font-['Outfit']" x-data="{ isCartOpen: false }">
    <!-- Header with Contact Details -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-10xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="py-4 md:py-6">
                <div class="flex flex-col md:flex-row md:items-start md:justify-between">
                    <div class="flex-1 mb-4 md:mb-0">
                        <h1 class="text-xl md:text-3xl font-semibold text-black mb-2">SUSHIDOG CLICK & COLLECT: WESTFIELD</h1>
                        <div class="flex items-center text-sm text-green-600 font-medium mb-3">
                            <span class="inline-block w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                            Open all day
                        </div>
                        <p class="text-gray-700 text-sm mb-4 max-w-2xl">
                            Freshly made sushi rolls, poke bowls and Asian-inspired salads. Choose from our range of
                            signature dishes or create your own and we'll have your order ready for collection when you
                            arrive.
                        </p>

                        <!-- Contact Details -->
                        <div class="flex flex-col space-y-2 text-sm hidden md:flex">
                            <div class="flex items-center text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="w-4 h-4 mr-2 text-gray-500">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 1 .7 2.81 2 2 0 0 1- .45 1.7L5.7 11.66a11 11 0 0 0 4.76 4.76l1.77-1.77a2 2 0 0 1 1.7-.45 12.84 12.84 0 0 1 2.81.7A2 2 0 0 1 22 16.92z">
                                    </path>
                                </svg>
                                <span>02087490901</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="w-4 h-4 mr-2 text-gray-500">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                                    <path d="M2 12h20"></path>
                                    <path d="M12 2a14.5 14.5 0 0 1 20 0 14.5 14.5 0 0 1-20 0"></path>
                                </svg>
                                <a href="http://www.sushidog.co.uk" target="_blank" rel="noopener noreferrer"
                                    class="text-blue-500 hover:text-blue-700 transition-colors">
                                    http://www.sushidog.co.uk
                                </a>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="w-4 h-4 mr-2 text-gray-500">
                                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" x2="17.5" y1="6.5" y2="6.5"></line>
                                </svg>
                                <a href="https://instagram.com/sushidoguk" target="_blank" rel="noopener noreferrer"
                                    class="text-pink-500 hover:text-pink-700 transition-colors">
                                    sushidoguk
                                </a>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="w-4 h-4 mr-2 text-gray-500">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                <span>Westfield Shopping Centre Ariel Way, London, W12 7GF</span>
                            </div>
                        </div>
                    </div>

                    <button @click="isCartOpen = true"
                        class="relative p-3 bg-[#1762A5] hover:bg-[#13508a] rounded-full transition-colors duration-200 md:ml-6 self-end md:self-start">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="w-6 h-6 text-white">
                            <circle cx="8" cy="21" r="1"></circle>
                            <circle cx="19" cy="21" r="1"></circle>
                            <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12">
                            </path>
                        </svg>
                        <!--[if BLOCK]><![endif]--><?php if(count($cartItems) > 0): ?>
                            <span
                                class="absolute -top-2 -right-2 bg-white text-[#1762A5] text-xs rounded-full w-6 h-6 flex items-center justify-center font-semibold border-2 border-[#1762A5]">
                                <?php echo e(array_sum(array_column($cartItems, 'quantity'))); ?>

                            </span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation Tabs -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-40">
        <div class="max-w-10xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between py-4 space-y-4 sm:space-y-0">
                <div x-data="{ activeCategory: <?php echo \Illuminate\Support\Js::from($selectedCategory)->toHtml() ?> }" class="flex space-x-4 sm:space-x-8 overflow-x-auto">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button
                            x-on:click="activeCategory = '<?php echo e($category->slug); ?>'; $wire.set('selectedCategory', '<?php echo e($category->slug); ?>');
                                const element = document.getElementById('category-<?php echo e($category->slug); ?>');
                                if (element) {
                                    const headerOffset = 140; // Account for fixed header + nav
                                    const elementPosition = element.offsetTop - headerOffset;
                                    window.scrollTo({ top: elementPosition, behavior: 'smooth' });
                                }"
                            :class="activeCategory === '<?php echo e($category->slug); ?>'
                                ? 'border-[#1762A5] text-black'
                                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                            class="py-2 px-2 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200">
                            <?php echo e($category->name); ?>

                        </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </div>

                <!-- Search Input -->
                <div class="relative sm:ml-6 flex-shrink-0">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="h-5 w-5 text-gray-400">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </svg>
                    </div>
                    <input type="text" placeholder="Search menu..." wire:model.live="searchTerm"
                        class="block w-full sm:w-64 pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-[#1762A5] focus:border-[#1762A5] text-sm" />
                </div>
            </div>
        </div>
    </nav>

    <!-- Menu Sections -->
    <main class="max-w-10xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!--[if BLOCK]><![endif]--><?php if($products->isEmpty() && $searchTerm): ?>
            <div class="text-center py-12">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="w-12 h-12 text-gray-400 mx-auto mb-4">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </svg>
                <p class="text-gray-500">No items found matching "<?php echo e($searchTerm); ?>"</p>
            </div>
        <?php else: ?>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $filteredProducts = $products->filter(function ($product) use ($category, $searchTerm, $selectedCategory) {
                        return ($selectedCategory === null || $product->category->slug === $selectedCategory) &&
                               (empty($searchTerm) ||
                                str_contains(strtolower($product->name), strtolower($searchTerm)) ||
                                str_contains(strtolower($product->description), strtolower($searchTerm)));
                    });
                ?>

                <!--[if BLOCK]><![endif]--><?php if($filteredProducts->isNotEmpty()): ?>
                    <section id="category-<?php echo e($category->slug); ?>" class="mb-12">
                        <h2 class="text-2xl font-semibold text-black mb-6">
                            <?php echo e($category->name); ?>

                        </h2>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $filteredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                        </div>
                    </section>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </main>

    <!-- Cart Sidebar (Placeholder for now) -->
    <div :class="{'visible': isCartOpen, 'invisible': !isCartOpen}"
        class="fixed inset-0 z-50 transition-opacity duration-300">
        <!-- Backdrop -->
        <div :class="{'opacity-50': isCartOpen, 'opacity-0': !isCartOpen}"
            class="absolute inset-0 bg-black transition-opacity duration-300" @click="isCartOpen = false"></div>

        <!-- Sidebar -->
        <div :class="{'translate-x-0': isCartOpen, 'translate-x-full': !isCartOpen}"
            class="absolute right-0 top-0 h-full w-full sm:max-w-md bg-white shadow-xl transform transition-transform duration-300">
            <div class="flex flex-col h-full">
                <!-- Cart Header -->
                <div class="flex items-center justify-between p-6 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-black">Your Order</h2>
                    <button @click="isCartOpen = false"
                        class="p-2 hover:bg-gray-100 rounded-full transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="w-5 h-5">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Cart Items (Placeholder) -->
                <div class="flex-1 overflow-y-auto p-6">
                    <?php if(count($cartItems) === 0): ?>
                        <div class="text-center py-12">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="w-12 h-12 text-gray-400 mx-auto mb-4">
                                <circle cx="8" cy="21" r="1"></circle>
                                <circle cx="19" cy="21" r="1"></circle>
                                <path
                                    d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12">
                                </path>
                            </svg>
                            <p class="text-gray-500">Your cart is empty</p>
                        </div>
                    <?php else: ?>
                        <div class="space-y-4">
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div wire:key="cart-item-<?php echo e($item['id']); ?>"
                                    class="flex items-center space-x-4 bg-gray-50 p-4 rounded-lg">
                                    <img src="<?php echo e(asset('storage/' . $item['image'])); ?>" alt="<?php echo e($item['name']); ?>"
                                        class="w-16 h-16 rounded-lg object-cover" />

                                    <div class="flex-1">
                                        <h3 class="font-medium text-black text-sm"><?php echo e($item['name']); ?></h3>
                                        <p class="text-gray-600 text-xs">$<?php echo e(number_format($item['price'], 2)); ?></p>
                                    </div>

                                    <div class="flex items-center space-x-2">
                                        <button wire:click="updateQuantity('<?php echo e($item['id']); ?>', -1)"
                                            class="p-1 hover:bg-gray-200 rounded-full transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="w-4 h-4">
                                                <path d="M5 12h14"></path>
                                            </svg>
                                        </button>

                                        <span class="w-8 text-center text-sm font-medium"><?php echo e($item['quantity']); ?></span>

                                        <button wire:click="updateQuantity('<?php echo e($item['id']); ?>', 1)"
                                            class="p-1 hover:bg-gray-200 rounded-full transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="w-4 h-4">
                                                <path d="M12 5v14"></path>
                                                <path d="M5 12h14"></path>
                                            </svg>
                                        </button>
                                    </div>

                                    <button wire:click="removeFromCart('<?php echo e($item['id']); ?>')"
                                        class="p-1 hover:bg-red-100 text-red-500 rounded-full transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="w-4 h-4">
                                            <path d="M18 6 6 18"></path>
                                            <path d="m6 6 12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>

                <!-- Cart Footer -->
                <!--[if BLOCK]><![endif]--><?php if(count($cartItems) > 0): ?>
                    <div class="border-t border-gray-200 p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-lg font-semibold text-black">Total:</span>
                            <span class="text-xl font-bold text-black">$<?php echo e(number_format($totalPrice, 2)); ?></span>
                        </div>

                        <button
                            class="w-full bg-[#1762A5] hover:bg-[#13508a] text-white font-semibold py-3 rounded-lg transition-colors duration-200">
                            Checkout
                        </button>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>
</div><?php /**PATH /Users/madebykush/Desktop/Dev folders/Roundi stores/e-commerce-cart/resources/views/livewire/home-page.blade.php ENDPATH**/ ?>
