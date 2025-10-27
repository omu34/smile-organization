<div>
    <footer class="mt-auto bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!-- Main Footer Content -->
            <div class="py-16 lg:py-20">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
                    
                    <!-- Brand Section -->
                    <!--[if BLOCK]><![endif]--><?php if($logo): ?>
                        <div class="lg:col-span-1 space-y-6">
                            <div class="flex items-center gap-4">
                                <div class="relative">
                                    <img src="<?php echo e(asset('storage/' . $logo)); ?>" alt="Footer Logo"
                                        class="h-16 w-16 rounded-xl object-cover shadow-lg ring-2 ring-white/20">
                                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl opacity-20 blur"></div>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-white">Burner Supply</h2>
                                    <p class="text-sm text-gray-300">Premium Quality Products</p>
                                </div>
                            </div>
                            <p class="text-gray-300 text-sm leading-relaxed">
                                Your trusted partner for high-quality supplies and exceptional service. Building lasting relationships through excellence.
                            </p>
                            
                            <!-- Social Icons -->
                            <!--[if BLOCK]><![endif]--><?php if($footers->first()?->socials): ?>
                                <div class="flex gap-3">
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $footers->first()->socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <!--[if BLOCK]><![endif]--><?php if(!empty($social['icon']) && !empty($social['url'])): ?>
                                            <a href="<?php echo e($social['url'] ?? '#'); ?>" 
                                               class="group flex items-center justify-center w-10 h-10 bg-white/10 hover:bg-white/20 rounded-lg transition-all duration-200 hover:scale-110">
                                                <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => 'icons.' . $social['icon']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\DynamicComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5 text-gray-300 group-hover:text-white transition-colors']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
                                            </a>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <!-- Footer Links Sections -->
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $footers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $footer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="space-y-6">
                            <h3 class="text-lg font-semibold text-white relative">
                                <?php echo e($footer->title); ?>

                                <div class="absolute -bottom-2 left-0 w-12 h-0.5 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full"></div>
                            </h3>
                            <ul class="space-y-3">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $footer->links ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e($link['url'] ?? '#'); ?>"
                                            class="group flex items-center gap-2 text-gray-300 hover:text-white transition-all duration-200 hover:translate-x-1">
                                            <span class="w-1 h-1 bg-gray-400 rounded-full group-hover:bg-blue-400 transition-colors"></span>
                                            <?php echo e($link['label'] ?? ''); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </ul>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                    <!-- Newsletter/Contact Section -->
                    <div class="space-y-6 lg:col-span-1">
                        <h3 class="text-lg font-semibold text-white relative">
                            Stay Connected
                            <div class="absolute -bottom-2 left-0 w-12 h-0.5 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full"></div>
                        </h3>
                        <p class="text-gray-300 text-sm">
                            Subscribe to get updates on new products and exclusive offers.
                        </p>
                        <div class="space-y-3">
                            <div class="flex">
                                <input type="email" placeholder="Enter your email"
                                    class="flex-1 px-4 py-2 bg-white/10 border border-white/20 rounded-l-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <button class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 rounded-r-lg font-medium transition-all duration-200 hover:shadow-lg">
                                    Subscribe
                                </button>
                            </div>
                            <p class="text-xs text-gray-400">
                                We respect your privacy. Unsubscribe at any time.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="border-t border-white/10">
                <div class="py-6 flex flex-col sm:flex-row justify-between items-center gap-4">
                    <p class="text-sm text-gray-400 text-center sm:text-left">
                        © <?php echo e(date('Y')); ?> <?php echo e($footers->first()?->footer_text ?? 'Burner Supply. All rights reserved.'); ?>

                    </p>
                    
                    <!-- Additional Links -->
                    <div class="flex flex-wrap justify-center sm:justify-end gap-6 text-sm">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">Terms of Service</a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-500/5 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-500/5 rounded-full blur-3xl"></div>
        </div>
    </footer>
</div><?php /**PATH /Users/madebykush/Desktop/Dev folders/accessory-page-clone/burner-supply-app/resources/views/livewire/site-footer.blade.php ENDPATH**/ ?>