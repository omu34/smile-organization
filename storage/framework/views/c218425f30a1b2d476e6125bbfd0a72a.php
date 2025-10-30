<div class="py-12  mx-auto">
    <div class="">
        <h2 class="text-3xl font-bold text-[#000000] mb-8 text-center">Featured <span class="">Articles</span></h2>

        <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <!--[if BLOCK]><![endif]--><?php if($article->media_type === 'image'): ?>
                        <img src="<?php echo e(asset('storage/' . $article->media_url)); ?>" class="w-full h-56 object-cover">
                    <?php elseif($article->media_type === 'video'): ?>
                        <video controls class="w-full h-56 object-cover">
                            <source src="<?php echo e(asset('storage/' . $article->media_url)); ?>" type="video/mp4">
                        </video>
                    <?php elseif($article->media_type === 'youtube'): ?>
                        <iframe class="w-full h-56" src="https://www.youtube.com/embed/<?php echo e($article->youtube_id); ?>" allowfullscreen></iframe>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <div class="p-4">
                        <h3 class="font-bold text-lg text-gray-800"><?php echo e($article->title); ?></h3>
                        <p class="text-gray-600 text-sm mt-2"><?php echo e(Str::limit($article->excerpt, 120)); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>
</div>

<?php /**PATH C:\Users\Rygss\Downloads\smile-organization\resources\views/livewire/featured-articles-section.blade.php ENDPATH**/ ?>