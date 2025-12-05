<div class="pt-20 pb-10 m-4"
     x-data="{ open: false }"
     x-on:show-modal.window="open = true"
     x-on:close-modal.window="open = false">

    
    <div class="mx-auto px-5">
        <div class="max-w-6xl mx-auto text-center mb-6">
            <h2 class="text-3xl font-bold mb-4"><?php echo e($title ?? 'Our Gallery'); ?></h2>
            <p class="text-md text-black leading-relaxed max-w-md mx-auto">
                <?php echo e($description ?? 'Smile resources include advocacy tools, psychosocial support for caregivers, educational materials, recreational activities, access to affordable therapies, and community-driven initiatives.'); ?>

            </p>
        </div>

        <div class="flex justify-between items-center mb-6">
            <input wire:model.live.debounce.500ms="search" placeholder="Search gallery..."
                   class="border rounded-md p-2 w-1/3">

            <select wire:model.live="categoryFilter" class="border rounded-md p-2">
                <option value="">All Categories</option>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category); ?>"><?php echo e($category ?: 'Uncategorized'); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </select>
        </div>

        <div key="<?php echo e($categoryFilter); ?>">
            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $groupedGalleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <h2 class="text-xl text-black font-bold mb-3 mt-6 border-b pb-1">
                    <?php echo e($category ?: 'Uncategorized'); ?>

                </h2>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div wire:click="showModal(<?php echo e($gallery->id); ?>)"
                             class="transition-transform transform hover:scale-105 cursor-pointer relative group">
                            <img src="<?php echo e($gallery->full_image_path); ?>" alt="<?php echo e($gallery->title); ?>"
                                 class="w-full h-64 md:h-80 object-cover rounded-xl shadow-md transition-transform transform hover:scale-105">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-80 opacity-0 group-hover:opacity-100 flex justify-center items-center text-white text-lg font-semibold transition">
                                View
                            </div>
                            <h3 class="mt-2 text-gray-900 font-semibold"><?php echo e($gallery->title); ?></h3>
                            <p class="text-black text-sm"><?php echo e($gallery->category); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-black text-center">No gallery images found.</p>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>

    
    <div x-show="open" x-cloak
         class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
         x-transition.opacity
         @keydown.escape.window="$wire.closeModal()">

        <!--[if BLOCK]><![endif]--><?php if($selectedGallery): ?>
            <div class="bg-white dark:bg-gray-900 rounded-xl overflow-hidden shadow-2xl max-w-4xl w-full mx-5 relative"
                 x-transition.scale
                 @click.outside="$wire.closeModal()">

                <button @click="$wire.closeModal()"
                        class="absolute top-3 right-3 z-10 bg-gray-800 text-white rounded-full p-2 hover:bg-gray-700">
                    ✕
                </button>

                <img src="<?php echo e($selectedGallery->full_image_path); ?>" alt="<?php echo e($selectedGallery->title); ?>"
                     class="w-full object-contain max-h-[80vh]">

                <div class="p-4 text-center">
                    <h2 class="text-xl font-bold text-black"><?php echo e($selectedGallery->title); ?></h2>
                    <p class="text-black"><?php echo e($selectedGallery->description); ?></p>
                </div>

                
                <!--[if BLOCK]><![endif]--><?php if(array_search($this->selectedGalleryId, $this->galleryIds) > 0): ?>
                    <div class="absolute inset-y-0 left-0 flex items-center">
                        <button wire:click="prevImage"
                                class="bg-black bg-opacity-40 text-white text-2xl px-3 py-2 rounded-r-lg hover:bg-opacity-70">‹</button>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                
                <?php if(array_search($this->selectedGalleryId, $this->galleryIds) < count($this->galleryIds) - 1): ?>
                    <div class="absolute inset-y-0 right-0 flex items-center">
                        <button wire:click="nextImage"
                                class="bg-black bg-opacity-40 text-white text-2xl px-3 py-2 rounded-l-lg hover:bg-opacity-70">›</button>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

</div>
<?php /**PATH C:\Users\Rygss\Downloads\smile-organization - Copy\resources\views/livewire/gallery-section.blade.php ENDPATH**/ ?>