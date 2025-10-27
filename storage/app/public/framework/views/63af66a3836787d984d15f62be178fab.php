<div x-data="{ cartOpen: false, checkout: false, startX: 0, currentX: 0, dragging: false }" x-on:cart:add.window="cartOpen = true" class="relative">

    <!-- Floating Cart Button -->
    <button @click="cartOpen = true" class="fixed bottom-6 right-6 p-4 rounded-full  transition duration-300">
    </button>

    <!-- Cart Overlay -->
    <div x-show="cartOpen" x-cloak class="fixed inset-0 z-50 flex" x-transition.opacity>
        <!-- Background Dim -->
        <div class="flex-1 " @click="cartOpen = false; checkout = false">
        
        </div>

        <!-- Cart Drawer -->
        <div class="w-full sm:w-[28rem] bg-white h-full overflow-y-auto shadow-2xl flex flex-col transform transition-transform duration-300"
            :style="dragging ? `transform: translateX(${Math.min(0, currentX - startX)}px)` : ''"
            @touchstart="startX = $event.touches[0].clientX; currentX = startX; dragging = true"
            @touchmove="currentX = $event.touches[0].clientX"
            @touchend="
                dragging = false;
                if (currentX - startX < -100) { cartOpen = false; checkout = false }
                else { currentX = startX }
            "
            x-transition:enter="transition transform duration-300" x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0" x-transition:leave="transition transform duration-300"
            x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">
            <!-- Header -->
            <div class="flex justify-between items-center border-b p-4 bg-gray-100">
                <h2 class="text-lg sm:text-xl font-bold text-gray-800" x-text="checkout ? 'Checkout' : 'Your Cart'">
                </h2>
                <button @click="cartOpen = false; checkout = false"
                    class="text-gray-500 hover:text-red-500 text-3xl leading-none transition">&times;
                </button>
            </div>

            <!-- Body -->
            <div class="flex-1 p-4 overflow-y-auto space-y-6">
                <!-- Cart Items -->
                <div x-show="!checkout" class="space-y-4">
                    <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="flex gap-3 border-b border-gray-200 pb-4">
                            <img src="<?php echo e(asset('storage/' . $item['product']['image'])); ?>"
                                class="w-16 h-16 rounded object-cover shadow" alt="">
                            <div class="flex-1 text-gray-800">
                                <p class="font-semibold"><?php echo e($item['product']['name']); ?></p>
                                <p class="text-sm text-gray-500">$<?php echo e(number_format($item['unit_price'], 2)); ?></p>
                                <div class="flex items-center gap-2 mt-2">
                                    <button wire:click="decreaseQty(<?php echo e($item['id']); ?>)"
                                        class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300 text-gray-700 transition">-</button>
                                    <span><?php echo e($item['qty']); ?></span>
                                    <button wire:click="increaseQty(<?php echo e($item['id']); ?>)"
                                        class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300 text-gray-700 transition">+</button>
                                </div>
                            </div>
                            <div class="text-right text-gray-800">
                                <p class="font-bold">$<?php echo e(number_format($item['line_total'], 2)); ?></p>
                                <button wire:click="removeItem(<?php echo e($item['product_id']); ?>)"
                                    class="text-xs text-red-500 hover:underline">Remove</button>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-center text-gray-500">Your cart is empty.</p>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>



                <!-- Totals -->
                <!--[if BLOCK]><![endif]--><?php if(!empty($items)): ?>
                    <div x-show="!checkout" class="space-y-2 bg-gray-50 p-4 rounded-lg shadow">
                        <div class="flex justify-between text-sm">
                            <span>Subtotal</span>
                            <span>$<?php echo e(number_format($subtotal, 2)); ?></span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span>Tax</span>
                            <span>$<?php echo e(number_format($tax, 2)); ?></span>
                        </div>
                        <div class="flex justify-between text-lg font-bold mt-2">
                            <span>Total</span>
                            <span>$<?php echo e(number_format($total, 2)); ?></span>
                        </div>
                    </div>

                    <!-- Checkout Form -->
                    <form wire:submit.prevent="placeOrder"
                        class="space-y-3 bg-gray-50 p-4 rounded-lg shadow text-gray-800" x-show="checkout">
                        <input type="text" wire:model="name" placeholder="Full Name"
                            class="w-full border rounded px-3 py-2 text-sm" required>
                        <input type="email" wire:model="email" placeholder="Email"
                            class="w-full border rounded px-3 py-2 text-sm" required>
                        <input type="text" wire:model="phone" placeholder="Phone"
                            class="w-full border rounded px-3 py-2 text-sm" required>
                        <textarea wire:model="shipping_address" placeholder="Shipping Address" class="w-full border rounded px-3 py-2 text-sm"
                            required></textarea>
                        <div>
                            <label class="block mb-1">Payment Method</label>
                            <select wire:model="payment_type" class="w-full border rounded px-3 py-2 text-sm">
                                <option value="online">Pay Online (Mpesa / Pesapal)</option>
                                <option value="cod">Cash on Delivery</option>
                            </select>
                        </div>
                        <!--[if BLOCK]><![endif]--><?php if($payment_type === 'online'): ?>
                            <div>
                                <label class="block mb-1">Choose Provider</label>
                                <select wire:model="method" class="w-full border rounded px-3 py-2 text-sm">
                                    <option value="mpesa">M-Pesa</option>
                                    <option value="pesapal">Pesapal</option>
                                </select>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <div class="flex flex-col sm:flex-row gap-3">
                            <!-- Back to Cart -->
                            <button type="button" @click="checkout = false"
                                class="flex-1 bg-gray-200 hover:bg-gray-300 py-2 rounded text-gray-800 font-semibold transition">
                                Back to Cart
                            </button>
                            <button type="submit"
                                class="flex-1 bg-green-600 hover:bg-green-700 py-2 rounded text-white font-semibold transition">
                                Place Order
                            </button>
                        </div>
                    </form>

                    <!-- Footer Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3" x-show="!checkout">
                        <button wire:click="clearCart"
                            class="flex-1 px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 text-gray-800 transition">
                            Clear
                        </button>
                        <button @click="checkout = true"
                            class="flex-1 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                            Checkout
                        </button>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


<div>


<!--[if BLOCK]><![endif]--><?php if(session('success')): ?>
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        x-init="setTimeout(() => show = false, 3000)" 
        x-transition 
        class="p-3 mb-4 text-sm text-green-700 bg-green-100 border border-green-200"
    >
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->


<!--[if BLOCK]><![endif]--><?php if(session('error')): ?>
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        x-init="setTimeout(() => show = false, 5000)" 
        x-transition 
        class="p-3 mb-4 text-sm text-red-700 bg-red-100 border border-red-200"
    >
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->

</div>

                



            </div>
        </div>
    </div>
</div><?php /**PATH /Users/madebykush/Desktop/Dev folders/Roundi stores/e-commerce-cart/resources/views/livewire/hybrid-cart.blade.php ENDPATH**/ ?>