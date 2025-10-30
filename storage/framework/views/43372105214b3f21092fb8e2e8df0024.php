<div class="sticky top-0 z-50 bg-gray-100 mt-0.5 border-b" x-data="{ mobileOpen: false, openMenu: null }">
    <div class="">
        <div class="flex items-center justify-between h-16">
            
            <div class="flex-shrink-0">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('navigation-logo-header-component', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3424289857-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>

            
            <nav class="hidden md:flex space-x-2 items-center">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <!--[if BLOCK]><![endif]--><?php if($menu->items && $menu->items->count()): ?>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $menu->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="relative" x-data="{ open: false }" @mouseleave="open = false">
                                <!--[if BLOCK]><![endif]--><?php if($item->children->count()): ?>
                                    <button @mouseover="open = true" @focus="open = true"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none">
                                        <span><?php echo e($item->title); ?></span>
                                        <svg class="ml-1 h-3 w-3" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </button>

                                    <div x-show="open" x-cloak x-transition
                                        class="absolute left-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-50">
                                        <div class="py-2">
                                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $item->children->where('is_active', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e($child->url ?? url($child->slug)); ?>"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                                    <?php echo e($child->title); ?>

                                                </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <a href="<?php echo e($item->url ?? url($item->slug)); ?>"
                                        class="px-4 py-2 text-sm text-gray-700 hover:text-gray-900">
                                        <?php echo e($item->title); ?>

                                    </a>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </nav>

            
            <div class="md:hidden">
                <button @click="mobileOpen = !mobileOpen"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-gray-900 focus:outline-none">
                    <svg x-show="!mobileOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                    </svg>
                    <svg x-show="mobileOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    
    <div x-show="mobileOpen" x-cloak x-transition class="md:hidden bg-white border-t">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $menu->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div>
                        <!--[if BLOCK]><![endif]--><?php if($item->children->count()): ?>
                            <button @click="openMenu = openMenu === <?php echo e($item->id); ?> ? null : <?php echo e($item->id); ?>"
                                class="w-full flex items-center justify-between px-4 py-2 text-left text-gray-700 hover:bg-gray-50">
                                <span><?php echo e($item->title); ?></span>
                                <svg class="h-4 w-4 transform"
                                    :class="{ 'rotate-180': openMenu === <?php echo e($item->id); ?> }" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>

                            <div x-show="openMenu === <?php echo e($item->id); ?>" x-cloak class="pl-6">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $item->children->where('is_active', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e($child->url ?? url($child->slug)); ?>"
                                        class="block px-4 py-2 text-gray-600 hover:bg-gray-50">
                                        <?php echo e($child->title); ?>

                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        <?php else: ?>
                            <a href="<?php echo e($menu->slug === 'about' ? route('about') : url($menu->slug)); ?>"
                                class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors rounded-md hover:text-neutral-900">
                                <?php echo e($menu->name); ?>

                            </a>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>

    <script>
        window.addEventListener('menus-refreshed', () => {
            // optional: small toast or console
            console.debug('Menus refreshed');
        });
    </script>
</div>
<?php /**PATH C:\Users\Rygss\Downloads\smile-organization\resources\views/livewire/dynamic-navbar.blade.php ENDPATH**/ ?>