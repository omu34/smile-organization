<div>
    <div x-data="{ open: <?php if ((object) ('show') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('show'->value()); ?>')<?php echo e('show'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('show'); ?>')<?php endif; ?>, showSuccess: false }" x-show="open" x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50" @keydown.escape.window="open = false">
        <div class="bg-white rounded-2xl shadow-lg max-w-md w-full p-6 relative" x-show="open" x-transition>
            <!-- Close button -->
            <button @click="open = false" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                ✕
            </button>

            <!-- Product details -->
            <div x-show="!showSuccess" class="space-y-4">
                <!-- Image -->
                <div class="aspect-w-16 aspect-h-12 bg-gray-100 rounded-lg overflow-hidden">
                    <!--[if BLOCK]><![endif]--><?php if($selectedProduct?->image): ?>
                        <img src="<?php echo e(asset('storage/' . $selectedProduct->image)); ?>" alt="<?php echo e($selectedProduct->name); ?>"
                            class="w-full h-48 object-cover" />
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>

                <!-- Name -->
                <h2 class="text-xl font-semibold text-gray-900">
                    <?php echo e($selectedProduct?->name); ?>

                </h2>

                <!-- Description -->
                <p class="text-gray-600">
                    <?php echo e($selectedProduct?->description); ?>

                </p>

                <div class="flex items-center justify-between">
                    <!-- Unit Price -->
                    <span class="text-lg font-semibold text-blue-700">
                        $<?php echo e(number_format($selectedProduct?->unit_price ?? 0, 2)); ?>

                    </span>

                    <!-- Quantity controls -->
                    <div class="flex items-center space-x-2">
                        <button wire:click="decrementQty"
                            class="w-8 h-8 flex items-center justify-center bg-gray-200 rounded-full hover:bg-gray-300">−</button>

                        <span class="w-6 text-center font-medium">
                            <?php echo e($qty); ?>

                        </span>

                        <button wire:click="incrementQty"
                            class="w-8 h-8 flex items-center justify-center bg-gray-200 rounded-full hover:bg-gray-300">+</button>
                    </div>
                </div>

                <!-- Line Total -->
                <div class="text-right text-gray-800 font-semibold">
                    Line Total: $<?php echo e(number_format(($selectedProduct?->unit_price ?? 0) * $qty, 2)); ?>

                </div>

                <!-- Confirm Add to Cart -->
                <div class="pt-4">
                    <button wire:click="confirmAddToCart"
                        @click="showSuccess = true; setTimeout(() => { showSuccess = false; open = false; $dispatch('open-cart'); }, 1200)"
                        class="w-full bg-[#1762A5] hover:bg-[#052646] text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                        :disabled="<?php echo e($qty); ?> === 0">
                        Add to Cart
                    </button>
                </div>
            </div>

            <!-- Success checkmark -->
            <div x-show="showSuccess" class="flex flex-col items-center justify-center py-10" x-transition>
                <svg class="w-16 h-16 text-green-500 animate-scale" fill="none" stroke="currentColor"
                    stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                <p class="mt-4 text-lg font-semibold text-gray-800">Added to Cart!</p>
            </div>
        </div>
    </div>

    <!-- Checkmark animation -->
    <style>
        @keyframes scale-up {
            0% {
                transform: scale(0.8);
                opacity: 0;
            }

            50% {
                transform: scale(1.1);
                opacity: 1;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .animate-scale {
            animation: scale-up 0.4s ease-in-out forwards;
        }
    </style>


<script>
function productModal(qty, unitPrice) {
    return {
        qty: qty,
        unitPrice: unitPrice,
        animatedTotal: qty * unitPrice,
        showSuccess: false,

        init() {
            this.$watch('qty', (newQty, oldQty) => {
                this.animateValue(oldQty * this.unitPrice, newQty * this.unitPrice, 300);
            });
        },

        animateValue(start, end, duration) {
            let startTime = null;
            const step = (timestamp) => {
                if (!startTime) startTime = timestamp;
                const progress = Math.min((timestamp - startTime) / duration, 1);
                this.animatedTotal = start + (end - start) * progress;
                if (progress < 1) {
                    requestAnimationFrame(step);
                }
            };
            requestAnimationFrame(step);
        }
    }
}
</script>

</div><?php /**PATH /Users/madebykush/Desktop/Dev folders/e-commerce-cart/resources/views/livewire/product-modal.blade.php ENDPATH**/ ?>