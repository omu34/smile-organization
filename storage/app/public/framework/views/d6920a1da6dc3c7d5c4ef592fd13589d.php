<div class="min-h-screen   font-['Outfit']" x-data="{ isCartOpen: false }">
    <!-- Header with Contact Details -->
    <?php if (isset($component)) { $__componentOriginalcc9ba680dd25954974702c1fb4cd7b01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcc9ba680dd25954974702c1fb4cd7b01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.homepage.header-component','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('homepage.header-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcc9ba680dd25954974702c1fb4cd7b01)): ?>
<?php $attributes = $__attributesOriginalcc9ba680dd25954974702c1fb4cd7b01; ?>
<?php unset($__attributesOriginalcc9ba680dd25954974702c1fb4cd7b01); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcc9ba680dd25954974702c1fb4cd7b01)): ?>
<?php $component = $__componentOriginalcc9ba680dd25954974702c1fb4cd7b01; ?>
<?php unset($__componentOriginalcc9ba680dd25954974702c1fb4cd7b01); ?>
<?php endif; ?>
    <!-- Navigation Tabs -->
    <?php if (isset($component)) { $__componentOriginal727da3cd6a7898f91152a48337ddfb9c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal727da3cd6a7898f91152a48337ddfb9c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.homepage.navigation','data' => ['categories' => $categories,'selectedCategory' => $selectedCategory]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('homepage.navigation'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['categories' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($categories),'selectedCategory' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($selectedCategory)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal727da3cd6a7898f91152a48337ddfb9c)): ?>
<?php $attributes = $__attributesOriginal727da3cd6a7898f91152a48337ddfb9c; ?>
<?php unset($__attributesOriginal727da3cd6a7898f91152a48337ddfb9c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal727da3cd6a7898f91152a48337ddfb9c)): ?>
<?php $component = $__componentOriginal727da3cd6a7898f91152a48337ddfb9c; ?>
<?php unset($__componentOriginal727da3cd6a7898f91152a48337ddfb9c); ?>
<?php endif; ?>
    <!-- Menu Sections -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!--[if BLOCK]><![endif]--><?php if($products->isEmpty() && $searchTerm): ?>
        <div class="text-center py-12">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="w-12 h-12 text-gray-400 mx-auto mb-4">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.3-4.3"></path>
            </svg>
            <p class="text-gray-500">No items found matching "<?php echo e($searchTerm); ?>"</p>
        </div>
    <?php else: ?>
        <!--[if BLOCK]><![endif]--><?php if($selectedCategory): ?>
            
            <?php
                $activeCategory = $categories->firstWhere('slug', $selectedCategory);
            ?>

            <!--[if BLOCK]><![endif]--><?php if($activeCategory && $products->isNotEmpty()): ?>
                <section id="category-<?php echo e($activeCategory->slug); ?>" class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-800">
                        <?php echo e($activeCategory->name); ?>

                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
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
                    </div>
                </section>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <?php else: ?>
            
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $filteredProducts = $products->filter(fn($product) => $product->category->slug === $category->slug);
                ?>

                <!--[if BLOCK]><![endif]--><?php if($filteredProducts->isNotEmpty()): ?>
                    <section id="category-<?php echo e($category->slug); ?>" class="mb-12">
                        <h2 class="text-2xl font-bold text-gray-800">
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
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</main>

    <!-- Cart Sidebar (Placeholder for now) -->
    <x-homepage.side-bar:cart-items="$cartItems" :total-price="$totalPrice" />
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('product-modal', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3244028457-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div><?php /**PATH /Users/madebykush/Desktop/Dev folders/e-commerce-cart/resources/views/livewire/home-page.blade.php ENDPATH**/ ?>