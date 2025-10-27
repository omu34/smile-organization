

<?php
    $background = $background ?? \App\Models\BackgroundColors::first();
?>

<!--[if BLOCK]><![endif]--><?php if($background): ?>
<nav class="bg-white border-b rounded-lg border-gray-200 sticky top-0 z-40"
     style="background-color: <?php echo e($background->bg_color3); ?>;">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between py-4 space-y-4 sm:space-y-0">

            
            <div class="flex space-x-4 sm:space-x-8 overflow-x-auto">
                
                <button
                    wire:click="setCategory(null)"
                    class="py-2 px-2 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200
                        <?php echo e($selectedCategory === null ? 'border-[#1762A5] text-black' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'); ?>">
                    All
                </button>

                
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button
                        wire:click="setCategory('<?php echo e($category->slug); ?>')"
                        class="py-2 px-2 border-b-2 font-medium text-sm whitespace-nowrap transition-colors duration-200
                            <?php echo e($selectedCategory === $category->slug ? 'border-[#1762A5] text-black' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'); ?>">
                        <?php echo e($category->name); ?>

                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            
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
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->

<?php /**PATH /Users/madebykush/Desktop/Dev folders/e-commerce-cart/resources/views/components/homepage/navigation.blade.php ENDPATH**/ ?>