<div data-aos="fade-up" data-aos-duration="1000" class="bg-white py-16 lg:py-24" x-data="{ open: false }"
    x-on:show-modal.window="open = true" x-on:close-modal.window="open = false">

    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="flex flex-col items-center md:items-start text-center md:text-left mb-12">
            <!-- Red Accent Line -->
            <div class="hidden md:block h-1 w-16 bg-red-600 mb-4"></div>
            
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight mb-4 uppercase">
                <?php echo e($title ?? 'Our Gallery'); ?>

            </h2>
            
            <p class="text-lg text-gray-600 max-w-2xl font-medium leading-relaxed">
                <?php echo e($description ?? 'Smile resources include advocacy tools, psychosocial support for caregivers, educational materials, recreational activities, access to affordable therapies, and community-driven initiatives.'); ?>

            </p>
        </div>

        <!-- Search & Filter Controls -->
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-10 bg-gray-50 p-4 rounded-xl border border-gray-100 shadow-sm">
            <div class="w-full sm:w-1/2">
                <input wire:model.live.debounce.500ms="search" type="text" placeholder="Search gallery..."
                    class="w-full bg-white border border-gray-300 rounded-lg px-4 py-3 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-red-600 transition-colors">
            </div>

            <div class="w-full sm:w-auto">
                <select wire:model.live="categoryFilter" 
                    class="w-full sm:w-auto bg-white border border-gray-300 rounded-lg px-4 py-3 text-sm font-bold uppercase tracking-wider text-gray-900 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-red-600 transition-colors">
                    <option value="">All Categories</option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category); ?>"><?php echo e($category ?: 'Uncategorized'); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </select>
            </div>
        </div>

        <div key="<?php echo e($categoryFilter); ?>">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $groupedGalleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="mb-12 last:mb-0">
                    <!-- Category Header -->
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="h-6 w-1 bg-red-600 rounded-full"></div>
                        <h3 class="text-2xl font-extrabold uppercase tracking-tight text-gray-900">
                            <?php echo e($category ?: 'Uncategorized'); ?>

                        </h3>
                    </div>

                    <!-- Images Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div wire:click="showModal(<?php echo e($gallery->id); ?>)"
                                class="bg-white rounded-xl shadow-sm hover:shadow-xl border border-gray-100 overflow-hidden flex flex-col group cursor-pointer transition-all duration-300">
                                
                                <!-- Media Wrapper -->
                                <div class="relative w-full aspect-video overflow-hidden bg-gray-100">
                                    <img src="<?php echo e($gallery->getFirstMediaUrl('gallery_images') ?? $gallery->full_image_path); ?>" alt="<?php echo e($gallery->title); ?>"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                    
                                    <!-- Hover Overlay -->
                                    <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 flex justify-center items-center text-white text-xs font-bold uppercase tracking-wider transition-opacity duration-300">
                                        <span class="border-2 border-white px-4 py-2 rounded-lg shadow-md">View Image</span>
                                    </div>
                                </div>

                                <!-- Card Body -->
                                <div class="p-6 flex flex-col flex-grow">
                                    <div class="text-xs font-bold uppercase tracking-wider text-red-600 mb-2">
                                        <?php echo e($gallery->category ?: 'Uncategorized'); ?>

                                    </div>
                                    <h4 class="text-xl font-bold text-gray-900 leading-tight group-hover:text-red-600 transition-colors">
                                        <?php echo e($gallery->title); ?>

                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-center py-16 bg-gray-50 rounded-xl border border-gray-100">
                    <p class="text-gray-500 font-medium">No gallery images found.</p>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

    
    <div x-show="open" x-cloak class="fixed inset-0 bg-black/80 backdrop-blur-sm flex items-center justify-center z-50 p-4"
        x-transition.opacity @keydown.escape.window="$wire.closeModal()">

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedGallery): ?>
            <div class="bg-white dark:bg-gray-900 rounded-2xl overflow-hidden shadow-2xl max-w-4xl w-full relative border border-gray-200 dark:border-gray-800"
                x-transition.scale @click.outside="$wire.closeModal()">

                <button @click="$wire.closeModal()"
                    class="absolute top-4 right-4 z-20 bg-gray-900/80 text-white rounded-full p-3 hover:bg-red-600 transition-colors shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

                <div class="relative bg-black flex items-center justify-center max-h-[70vh] overflow-hidden">
                    <img src="<?php echo e($selectedGallery->getFirstMediaUrl('gallery_images') ?? $selectedGallery->full_image_path); ?>" alt="<?php echo e($selectedGallery->title); ?>"
                        class="w-full max-h-[70vh] object-contain">

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(array_search($this->selectedGalleryId, $this->galleryIds) > 0): ?>
                        <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                            <button wire:click="prevImage"
                                class="bg-black/60 hover:bg-red-600 text-white p-3 rounded-full transition-colors shadow-lg focus:outline-none">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(array_search($this->selectedGalleryId, $this->galleryIds) < count($this->galleryIds) - 1): ?>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                            <button wire:click="nextImage"
                                class="bg-black/60 hover:bg-red-600 text-white p-3 rounded-full transition-colors shadow-lg focus:outline-none">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <div class="p-8 text-left bg-white dark:bg-gray-900 border-t border-gray-100 dark:border-gray-800">
                    <div class="text-xs font-bold uppercase tracking-wider text-red-600 mb-2">
                        <?php echo e($selectedGallery->category ?: 'Uncategorized'); ?>

                    </div>
                    <h3 class="text-2xl font-extrabold text-gray-900 dark:text-white mb-3">
                        <?php echo e($selectedGallery->title); ?>

                    </h3>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedGallery->description): ?>
                        <p class="text-gray-600 dark:text-gray-300 text-base leading-relaxed">
                            <?php echo e($selectedGallery->description); ?>

                        </p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

</div><?php /**PATH F:\projects\smile-organization\resources\views/livewire/gallery-section.blade.php ENDPATH**/ ?>