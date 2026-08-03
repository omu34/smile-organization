<div class="bg-white py-16 lg:py-24" data-aos="fade-up" data-aos-duration="1000">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="flex flex-col items-center md:items-start text-center md:text-left mb-12">
            <!-- Red Accent Line -->
            <div class="hidden md:block h-1 w-16 bg-red-600 mb-4"></div>
            
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight mb-4 uppercase">
                Featured Articles
            </h2>
            
            <h4 class="text-lg md:text-xl text-gray-600 max-w-2xl font-medium">
                Welcome
            </h4>
        </div>

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="bg-white rounded-xl shadow-sm hover:shadow-xl border border-gray-100 overflow-hidden flex flex-col group transition-all duration-300">
                    
                    <!-- Media Wrapper -->
                    <div class="relative w-full h-56 overflow-hidden bg-gray-100">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($article->media_type === 'image'): ?>
                            <img src="<?php echo e($article->getFirstMediaUrl('featured_media') ?? $article->full_media_url); ?>" 
                                 alt="<?php echo e($article->title); ?>" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <?php elseif($article->media_type === 'video'): ?>
                            <video controls class="w-full h-full object-cover">
                                <source src="<?php echo e($article->getFirstMediaUrl('featured_media') ?? $article->full_media_url); ?>" type="video/mp4">
                            </video>
                        <?php elseif($article->media_type === 'youtube'): ?>
                            <iframe class="w-full h-full border-0" 
                                    src="https://www.youtube.com/embed/<?php echo e($article->youtube_id); ?>" 
                                    allowfullscreen></iframe>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight group-hover:text-red-600 transition-colors">
                            <?php echo e($article->title); ?>

                        </h3>
                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($article->excerpt): ?>
                            <p class="text-gray-600 text-base leading-relaxed mb-6 flex-grow line-clamp-3">
                                <?php echo e(Str::limit($article->excerpt, 120)); ?>

                            </p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

    </div>
</div><?php /**PATH F:\projects\smile-organization\resources\views/livewire/featured-articles-section.blade.php ENDPATH**/ ?>