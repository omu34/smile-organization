<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto py-12 px-4">
    <h1 class="text-3xl font-bold mb-4"><?php echo e($article->title); ?></h1>

    <?php if($article->primaryMedia): ?>
        <?php ($m = $article->primaryMedia); ?>
        <?php if($m->type === 'image'): ?>
            <img src="<?php echo e(asset('storage/' . $m->file_path)); ?>" class="rounded-lg mb-6 w-full" alt="">
        <?php elseif($m->type === 'video_local'): ?>
            <video controls class="w-full rounded-lg mb-6">
                <source src="<?php echo e(asset('storage/' . $m->file_path)); ?>" type="video/mp4">
            </video>
        <?php elseif($m->type === 'youtube' && $m->youtube_id): ?>
            <iframe class="w-full h-64 mb-6" src="https://www.youtube.com/embed/<?php echo e($m->youtube_id); ?>" frameborder="0" allowfullscreen></iframe>
        <?php endif; ?>
    <?php endif; ?>

    <div class="prose max-w-none">
        <?php echo $article->body; ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('components.layouts.pages-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Rygss\Downloads\smile-organization\resources\views\articles\show.blade.php ENDPATH**/ ?>