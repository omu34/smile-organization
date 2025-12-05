<?php
    $background = $background ?? \App\Models\BackgroundColors::first();
?>
<!--[if BLOCK]><![endif]--><?php if($background): ?>


    <div class="w-full shadow-md h-16 rounded-lg flex items-center"
        style="background-color: <?php echo e($background->bg_color2); ?>;">

        <?php
            $footer = $footers->first();
        ?>

        <!--[if BLOCK]><![endif]--><?php if($footer): ?>
            <div class="max-w-10xl mx-auto flex w-full items-center justify-between px-6">


                <div class="flex items-center">
                    <a href="<?php echo e($footer->link ?? url('/')); ?>">
                        <img src="<?php echo e(Storage::url($footer->logo)); ?>" alt="Logo" class="h-12 w-auto rounded-full">

                    </a>
                </div>


                <div class="text-right text-black">
                    <p class="text-sm md:text-base">
                        © <?php echo e(date('Y')); ?> <?php echo e($footer->footer_text); ?>

                    </p>
                </div>

            </div>
    </div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH /Users/madebykush/Desktop/Dev folders/e-commerce-cart/resources/views/components/homepage/site-footer.blade.php ENDPATH**/ ?>
