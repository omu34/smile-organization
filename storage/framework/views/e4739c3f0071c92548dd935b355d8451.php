<div>
    <section class="py-8">
        <div class=". mx-auto px-4">
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-red-700">Featured <span class="text-indigo-900">Articles</span></h2>
            </div>

            <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3">
                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php ($m = $article->media->firstWhere('is_primary', true) ?? $article->media->first()); ?>
                    <article class="flex flex-col rounded-lg shadow-lg overflow-hidden bg-white">
                        <div class="flex-shrink-0 relative h-48 w-full bg-gray-200">
                            <?php if($m): ?>
                                <?php if($m->type === 'image' && $m->file_path): ?>
                                    <img src="<?php echo e(asset('storage/' . $m->file_path)); ?>" alt="<?php echo e($article->title); ?>"
                                        class="h-full w-full object-cover">
                                <?php elseif($m->type === 'video_local' && $m->file_path): ?>
                                    <video class="h-full w-full object-cover" muted playsinline preload="metadata" loop>
                                        <source src="<?php echo e(asset('storage/' . $m->file_path)); ?>" type="video/mp4">
                                    </video>
                                <?php elseif($m->type === 'youtube' && $m->youtube_id): ?>
                                    <iframe class="h-full w-full"
                                        src="https://www.youtube.com/embed/<?php echo e($m->youtube_id); ?>?rel=0" frameborder="0"
                                        allowfullscreen></iframe>
                                <?php endif; ?>
                            <?php else: ?>
                                <img src="<?php echo e(asset('images/placeholder-article.jpg')); ?>" alt="Placeholder"
                                    class="h-full w-full object-cover">
                            <?php endif; ?>
                        </div>

                        <div class="flex-1 p-6 flex flex-col justify-between">
                            <div class="flex-1">
                                <p class="text-sm text-red-600 mb-2">
                                    <a href="<?php echo e(route('articles.show', $article->slug)); ?>" class="hover:underline">Read
                                        Article →</a>
                                </p>
                                <a href="<?php echo e(route('articles.show', $article->slug)); ?>">
                                    <h3 class="text-lg font-semibold text-gray-900"><?php echo e($article->title); ?></h3>
                                    <p class="mt-3 text-gray-700 text-sm">
                                        <?php echo e(\Illuminate\Support\Str::limit($article->excerpt ?? strip_tags($article->body), 160)); ?>

                                    </p>
                                </a>
                            </div>

                            <div class="mt-4 flex items-center text-sm text-gray-500">
                                <time
                                    datetime="<?php echo e($article->created_at->toDateString()); ?>"><?php echo e($article->created_at->format('M d, Y')); ?></time>
                                <span class="mx-2">·</span>
                                <span><?php echo e($article->reading_time_minutes ?? '—'); ?> min read</span>
                            </div>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

</div><?php /**PATH C:\Users\Rygss\Downloads\smile-organization\resources\views\livewire\featured-articles.blade.php ENDPATH**/ ?>