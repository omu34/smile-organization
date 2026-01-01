<div id="aboutus" class="bg-white " data-aos="fade-up" data-aos-duration="1000">
    <div class=". mx-auto py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8 px-4 md:px-0">
            <div class="max-w-xl ml-4 mr-4">
                <h2 class="text-3xl font-bold text-black mb-6">About <span class="">Us</span></h2>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($article): ?>
                    <p class="text-black text-md"><?php echo \Illuminate\Support\Str::limit($article->body, 600); ?></p>
                    <div class="mt-6">
                        <a href="<?php echo e(route('articles.show', $article->slug)); ?>"
                            class="inline-block bg-black hover:bg-green-700 text-white px-4 py-2 rounded">
                            Read more
                        </a>
                    </div>
                <?php else: ?>
                    <p class="text-black text-md">
                        We are a Kenyan organization, registered in 2020, dedicated to supporting persons with disabilities...
                    </p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <div class="mt-12 md:mt-0 flex items-center justify-center">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($article && $article->primaryMedia): ?>
                    <?php ($m = $article->primaryMedia); ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($m->type === 'image' && $m->file_path): ?>
                        <img src="<?php echo e($m->full_image_url); ?>" alt="<?php echo e($article->title); ?>"
                            class="object-cover rounded-lg shadow-md max-h-64 w-full" />
                    <?php elseif($m->type === 'video_local' && $m->file_path): ?>
                        <video controls class="rounded-lg shadow-md max-h-64 w-full">
                            <source src="<?php echo e($m->full_image_url); ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    <?php elseif($m->type === 'youtube' && $m->youtube_id): ?>
                        <iframe class="rounded-lg shadow-md w-full max-h-64"
                            src="https://www.youtube.com/embed/<?php echo e($m->youtube_id); ?>"
                            title="YouTube video" frameborder="0" allowfullscreen></iframe>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php else: ?>
                    <img src="<?php echo e(asset('aboutus/afunction.jpg')); ?>" alt="About image"
                        class="object-cover rounded-lg shadow-md w-full" />
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Bernard O\Downloads\herd-projects\smile-with-ai\resources\views/livewire/about-us.blade.php ENDPATH**/ ?>