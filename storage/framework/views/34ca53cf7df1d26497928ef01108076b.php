<div class="py-12 " data-aos="fade-up" data-aos-duration="1000">
    <div class="m-4">
        
        <div class="flex justify-start item-1 md:justify-center items-center flex-col md:py-4">
                <h2
                    class="font-bold text-xl md:text-3xl leading-tight mb-2 text-[#d13642]  rounded-md border-b-2 border-red-800 text-center md:text-left">
                    Featured Articles
                    
                </h2>
                <h4
                    class="sm:text-lg md:text-xl  text-lg  font-medium text-gray-800 mt-4 tracking-wide  mx-auto max-w-lg ml-4 mr-4 md:ml-0 md:mr-0 text-center">
                     Welcome
                    
                </h4>
            </div>
            
                
            

        <div class="mx-auto grid gap-6 sm:grid-cols-2 md:grid-cols-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($article->media_type === 'image'): ?>
                        <img src="<?php echo e(asset('storage/' . $article->media_url)); ?>" class="w-full h-56 object-cover">
                    <?php elseif($article->media_type === 'video'): ?>
                        <video controls class="w-full h-56 object-cover">
                            <source src="<?php echo e(asset('storage/' . $article->media_url)); ?>" type="video/mp4">
                        </video>
                    <?php elseif($article->media_type === 'youtube'): ?>
                        <iframe class="w-full h-56" src="https://www.youtube.com/embed/<?php echo e($article->youtube_id); ?>" allowfullscreen></iframe>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <div class="p-4">
                        <h3 class="font-bold text-lg text-gray-800"><?php echo e($article->title); ?></h3>
                        <p class="text-gray-600 text-sm mt-2"><?php echo e(Str::limit($article->excerpt, 120)); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</div>

<?php /**PATH C:\Users\Rygss\Downloads\smile-with-ai\resources\views/livewire/featured-articles-section.blade.php ENDPATH**/ ?>