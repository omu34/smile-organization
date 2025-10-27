<div>
    <!-- Drawer -->
    <!--[if BLOCK]><![endif]--><?php if($view === 'drawer'): ?>
        <div class="fixed top-0 right-0 w-full sm:w-96 max-h-screen bg-white shadow-lg z-50 flex flex-col">
            <!-- Header -->
            <div class="flex justify-between items-center px-4 py-3 border-b sticky top-0 bg-[#1762A5] z-10">
                <h2 class="text-lg text-gray-100  hover:text-gray-800 font-semibold">Your Cart</h2>
                <button wire:click="closeCart" class="text-gray-100 text-lg hover:text-gray-800">&times;</button>
            </div>

            <!-- Cart Items + Totals + Checkout -->
            <div class="overflow-y-auto px-4 py-3">
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex gap-3 items-center border-b py-3">
                        <img src="<?php echo e(asset('storage/' . $item['product']['image'])); ?>"
                            class="w-16 h-16 rounded object-cover shadow" alt="">

                        <div class="flex-1">
                            <h3 class="text-sm font-semibold"><?php echo e($item['product']['name']); ?></h3>
                            <p class="text-xs text-gray-500">KES <?php echo e(number_format($item['unit_price'], 2)); ?></p>

                            <div class="flex items-center gap-2 mt-2">
                                <button wire:click="decreaseQty(<?php echo e($item['id']); ?>)"
                                    class="px-2 py-1 bg-gray-200 rounded">-</button>
                                <span class="px-2"><?php echo e($item['qty']); ?></span>
                                <button wire:click="increaseQty(<?php echo e($item['id']); ?>)"
                                    class="px-2 py-1 bg-gray-200 rounded">+</button>
                            </div>
                        </div>

                        <div class="flex flex-col items-end">
                            <p class="text-sm font-medium">KES <?php echo e(number_format($item['line_total'], 2)); ?></p>
                            <button wire:click="removeItem(<?php echo e($item['product_id']); ?>)"
                                class="text-xs text-red-500 mt-1">Remove</button>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-center text-gray-500 mt-10">Your cart is empty.</p>
                <?php endif; ?>

                <!--[if BLOCK]><![endif]--><?php if(count($items) > 0): ?>
                    <!-- Totals -->
                    <div class="pt-4 border-t mt-4">
                        <div class="flex justify-between text-sm mb-1">
                            <span>Subtotal</span>
                            <span>KES <?php echo e(number_format($subtotal, 2)); ?></span>
                        </div>
                        <div class="flex justify-between text-sm mb-1">
                            <span>Tax (16%)</span>
                            <span>KES <?php echo e(number_format($tax, 2)); ?></span>
                        </div>
                        <div class="flex justify-between font-semibold text-base">
                            <span>Total</span>
                            <span>KES <?php echo e(number_format($total, 2)); ?></span>
                        </div>
                    </div>

                    <!-- Checkout Form -->
                    <form wire:submit.prevent="placeOrder" class="space-y-3 mt-4">
                        <input type="text" wire:model="name" placeholder="Full Name"
                            class="w-full border rounded px-3 py-2 text-sm" />
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-xs text-red-500"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

                        <input type="text" wire:model="phone" placeholder="Phone Number"
                            class="w-full border rounded px-3 py-2 text-sm" />
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-xs text-red-500"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

                        <input type="email" wire:model="email" placeholder="Email"
                            class="w-full border rounded px-3 py-2 text-sm" />
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-xs text-red-500"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

                        <input type="text" wire:model="shipping_address" placeholder="Shipping Address"
                            class="w-full border rounded px-3 py-2 text-sm" />
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['shipping_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-xs text-red-500"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

                        <div>
                            <label class="block text-sm font-medium">Payment Type</label>
                            <select wire:model="payment_type" class="w-full border rounded px-3 py-2 text-sm">
                                <option value="online">Pay Online</option>
                                <option value="cod">Cash on Delivery</option>
                            </select>
                        </div>

                        <!--[if BLOCK]><![endif]--><?php if($payment_type === 'online'): ?>
                            <div>
                                <label class="block text-sm font-medium">Payment Method</label>
                                <select wire:model="method" class="w-full border rounded px-3 py-2 text-sm">
                                    <option value="mpesa">M-Pesa</option>
                                    <option value="pesapal">Pesapal</option>
                                </select>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-red-500 text-xs"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <div class="flex flex-col sm:flex-row gap-3">
                            <button wire:click="clearCart" type="button"
                                class="flex-1 px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 text-gray-800 transition">
                                Clear
                            </button>
                            <button type="submit"
                                class="flex-1 bg-green-600 hover:bg-green-700 py-2 rounded text-white font-semibold transition">
                                Place Order
                            </button>
                        </div>
                    </form>

                    <!-- Flash Messages -->
                    <div class="p-4">
                        <!--[if BLOCK]><![endif]--><?php if(session('success')): ?>
                            <div class="p-3 mb-4 text-sm text-green-700 bg-green-100 border border-green-200 rounded">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <!--[if BLOCK]><![endif]--><?php if(session('error')): ?>
                            <div class="p-3 mb-4 text-sm text-red-700 bg-red-100 border border-red-200 rounded">
                                <?php echo e(session('error')); ?>

                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div><?php /**PATH /Users/madebykush/Desktop/Dev folders/e-commerce-cart/resources/views/livewire/hybrid-cart.blade.php ENDPATH**/ ?>