


<div
    x-data
    @click="$dispatch('open-product-modal', { productId: <?php echo e($product->id); ?> })"
    class="cursor-pointer bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-200"
>


    <div class="aspect-w-16 aspect-h-12 bg-gray-100"><img src="<?php echo e($product->image ? Storage::url($product->image) : Storage::url('images/fallback.png')); ?>"
     alt="<?php echo e($product->name); ?>"
     class="w-full h-48 object-cover">

             
    </div>

    <div class="p-4">
        <h3 class="font-semibold text-lg mb-2 text-black hover:text-[#1762A5]">
            <?php echo e($product->name); ?>

        </h3>
        <p class="text-sm mb-3 line-clamp-2 text-black hover:text-[#1762A5]">
            <?php echo e($product->description); ?>

        </p>

        <div class="flex items-center justify-between">
            <span class="text-xl font-semibold text-blue-850 hover:text-[#1762A5]">
                $<?php echo e(number_format($product->unit_price, 2)); ?>

            </span>

            <!-- ✅ Always open modal instead of direct add-to-cart -->
            <button
                @click.stop="$dispatch('open-product-modal', { productId: <?php echo e($product->id); ?> })"
                class="bg-[#1762A5] hover:bg-[#052646] text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200 text-sm">
                Add to Cart
            </button>
        </div>
    </div>
</div>








<?php /**PATH /Users/madebykush/Desktop/Dev folders/e-commerce-cart/resources/views/components/homepage/product-card.blade.php ENDPATH**/ ?>