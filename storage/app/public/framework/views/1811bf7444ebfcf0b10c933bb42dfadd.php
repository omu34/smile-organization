<div
    class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-200">
    <div class="aspect-w-16 aspect-h-12 bg-gray-100">
        <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>"
            class="w-full h-48 object-cover" />
    </div>

    <div class="p-4">
        <h3 class="font-semibold text-lg text-black mb-2"><?php echo e($product->name); ?></h3>
        <p class="text-gray-600 text-sm mb-3 line-clamp-2"><?php echo e($product->description); ?></p>

        <div class="flex items-center justify-between">
            <span class="text-xl font-semibold text-black">$<?php echo e(number_format($product->unit_price, 2)); ?></span>

            <button wire:click="addToCart"
                class="bg-[#1762A5] hover:bg-[#13508a] text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200 text-sm">
                Add to Cart
            </button>
        </div>
    </div>
</div><?php /**PATH /Users/madebykush/Desktop/Dev folders/Roundi stores/e-commerce-cart/resources/views/livewire/product-card.blade.php ENDPATH**/ ?>