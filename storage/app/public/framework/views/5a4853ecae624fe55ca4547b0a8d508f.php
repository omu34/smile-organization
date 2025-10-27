<li class="list-none col-span-6 sm:col-span-3 lg:col-span-2">
    <article class="relative overflow-hidden h-full flex flex-col rounded">
        <!-- Product Image + Hover Add-to-Cart -->
        <div class="relative group w-full overflow-hidden bg-secondary aspect-square rounded">
            

            <div class="relative z-0 w-full overflow-hidden bg-gray-100 aspect-square rounded">
                <img
                    alt="<?php echo e($product->name); ?>"
                    src="<?php echo e(asset('storage/' . $product->image)); ?>"
                    class="absolute top-0 left-0 z-10 w-full h-full object-cover object-center transition-opacity duration-300 ease-in-out">
            </div>

            <!-- Hover / Mobile overlay -->
            <div
                class="rounded-b-lg p-2 backdrop-blur-sm bg-neutral-500/10 flex justify-center items-center
                    absolute bottom-0 left-0 right-0 z-10 transition-[opacity,transform] duration-300
                    sm:opacity-0 sm:translate-y-full sm:group-hover:opacity-100 sm:group-hover:translate-y-0 overflow-hidden">
                <div class="flex-auto space-y-2">
                    <!-- Add to Cart Button -->
                    <button
                        wire:click="addToCart"
                        wire:loading.attr="disabled"
                        class="inline-flex items-center justify-center gap-2 whitespace-nowrap disabled:pointer-events-none disabled:opacity-50 shrink-0 outline-none h-10 px-6 rounded-full w-full relative text-sm font-semibold transition-colors text-neutral-800 bg-neutral-50 hover:bg-neutral-100 shadow-none">
                        <span wire:loading.remove>Add to cart</span>
                        <span wire:loading>Adding...</span>
                    </button>

                    <!-- Optional: Proceed to Checkout button (mobile-first, hidden on desktop) -->
                    <a href="<?php echo e(route('checkout')); ?>"
                       class="inline-flex items-center justify-center gap-2 whitespace-nowrap h-10 px-6 rounded-full w-full relative text-sm font-semibold transition-colors text-white bg-primary hover:bg-primary/90 shadow-none sm:hidden">
                        Proceed to Checkout
                    </a>
                </div>
            </div>
        </div>

        <!-- Product Details -->
        <div class="p-3 space-y-1 flex flex-col text-left">
            <h2 class="text-sm font-normal text-foreground/75 hover:text-foreground/900">
                <?php echo e($product->name); ?>

            </h2>

            
            <!--[if BLOCK]><![endif]--><?php if($product->description): ?>
                <div class="relative group/desc">
                    <p class="text-xs text-gray-500 line-clamp-2 cursor-help">
                        <?php echo e(Str::limit($product->description, 60)); ?>

                    </p>

                    <!-- Tooltip -->
                    <div
                        class="absolute z-20 opacity-0 invisible group-hover/desc:opacity-100 group-hover/desc:visible
                            transition-opacity duration-300 px-3 py-2 text-xs text-white bg-gray-900 rounded-md shadow-lg
                            -top-2 left-1/2 -translate-x-1/2 -translate-y-full
                            max-w-xs sm:max-w-sm md:max-w-md break-words
                            before:content-[''] before:absolute before:top-full before:left-1/2 before:-translate-x-1/2
                            before:border-8 before:border-transparent before:border-t-gray-900">
                        <?php echo e($product->description); ?>

                    </div>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <!-- Price -->
            <footer class="text-sm font-bold text-foreground/75">
                $<?php echo e(number_format($product->unit_price, 2)); ?>

            </footer>
        </div>
    </article>
</li><?php /**PATH /Users/madebykush/Desktop/Dev folders/accessory-page-clone/burner-supply-app/resources/views/livewire/product-card.blade.php ENDPATH**/ ?>