<?php
    $customBlocks = $getCustomBlocks();
    $extraAttributeBag = $getExtraAttributeBag();
    $fieldWrapperView = $getFieldWrapperView();
    $id = $getId();
    $isDisabled = $isDisabled();
    $livewireKey = $getLivewireKey();
    $key = $getKey();
    $mergeTags = $getMergeTags();
    $statePath = $getStatePath();
    $tools = $getTools();
    $toolbarButtons = $getToolbarButtons();
    $floatingToolbars = $getFloatingToolbars();
    $fileAttachmentsMaxSize = $getFileAttachmentsMaxSize();
    $fileAttachmentsAcceptedFileTypes = $getFileAttachmentsAcceptedFileTypes();
?>

<?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $fieldWrapperView] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\DynamicComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['field' => $field]); ?>
    <?php if (isset($component)) { $__componentOriginal505efd9768415fdb4543e8c564dad437 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal505efd9768415fdb4543e8c564dad437 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.input.wrapper','data' => ['valid' => ! $errors->has($statePath),'xCloak' => true,'attributes' => 
            \Filament\Support\prepare_inherited_attributes($extraAttributeBag)
                ->class(['fi-fo-rich-editor'])
        ]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::input.wrapper'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['valid' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(! $errors->has($statePath)),'x-cloak' => true,'attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(
            \Filament\Support\prepare_inherited_attributes($extraAttributeBag)
                ->class(['fi-fo-rich-editor'])
        )]); ?>
        <div
            x-load
            x-load-src="<?php echo e(\Filament\Support\Facades\FilamentAsset::getAlpineComponentSrc('rich-editor', 'filament/forms')); ?>"
            x-data="richEditorFormComponent({
                        acceptedFileTypes: <?php echo \Illuminate\Support\Js::from($fileAttachmentsAcceptedFileTypes)->toHtml() ?>,
                        acceptedFileTypesValidationMessage: <?php echo \Illuminate\Support\Js::from($fileAttachmentsAcceptedFileTypes ? __('filament-forms::components.rich_editor.file_attachments_accepted_file_types_message', ['values' => implode(', ', $fileAttachmentsAcceptedFileTypes)]) : null)->toHtml() ?>,
                        activePanel: <?php echo \Illuminate\Support\Js::from($getActivePanel())->toHtml() ?>,
                        canAttachFiles: <?php echo \Illuminate\Support\Js::from($hasFileAttachments())->toHtml() ?>,
                        deleteCustomBlockButtonIconHtml: <?php echo \Illuminate\Support\Js::from(\Filament\Support\generate_icon_html(\Filament\Support\Icons\Heroicon::Trash, alias: \Filament\Forms\View\FormsIconAlias::COMPONENTS_RICH_EDITOR_PANELS_CUSTOM_BLOCK_DELETE_BUTTON)->toHtml())->toHtml() ?>,
                        editCustomBlockButtonIconHtml: <?php echo \Illuminate\Support\Js::from(\Filament\Support\generate_icon_html(\Filament\Support\Icons\Heroicon::PencilSquare, alias: \Filament\Forms\View\FormsIconAlias::COMPONENTS_RICH_EDITOR_PANELS_CUSTOM_BLOCK_EDIT_BUTTON)->toHtml())->toHtml() ?>,
                        extensions: <?php echo \Illuminate\Support\Js::from($getTipTapJsExtensions())->toHtml() ?>,
                        key: <?php echo \Illuminate\Support\Js::from($key)->toHtml() ?>,
                        isDisabled: <?php echo \Illuminate\Support\Js::from($isDisabled)->toHtml() ?>,
                        isLiveDebounced: <?php echo \Illuminate\Support\Js::from($isLiveDebounced())->toHtml() ?>,
                        isLiveOnBlur: <?php echo \Illuminate\Support\Js::from($isLiveOnBlur())->toHtml() ?>,
                        liveDebounce: <?php echo \Illuminate\Support\Js::from($getNormalizedLiveDebounce())->toHtml() ?>,
                        livewireId: <?php echo \Illuminate\Support\Js::from($this->getId())->toHtml() ?>,
                        maxFileSize: <?php echo \Illuminate\Support\Js::from($fileAttachmentsMaxSize)->toHtml() ?>,
                        maxFileSizeValidationMessage: <?php echo \Illuminate\Support\Js::from($fileAttachmentsMaxSize ? trans_choice('filament-forms::components.rich_editor.file_attachments_max_size_message', $fileAttachmentsMaxSize, ['max' => $fileAttachmentsMaxSize]) : null)->toHtml() ?>,
                        mergeTags: <?php echo \Illuminate\Support\Js::from($mergeTags)->toHtml() ?>,
                        noMergeTagSearchResultsMessage: <?php echo \Illuminate\Support\Js::from($getNoMergeTagSearchResultsMessage())->toHtml() ?>,
                        placeholder: <?php echo \Illuminate\Support\Js::from($getPlaceholder())->toHtml() ?>,
                        state: $wire.<?php echo e($applyStateBindingModifiers("\$entangle('{$statePath}')", isOptimisticallyLive: false)); ?>,
                        statePath: <?php echo \Illuminate\Support\Js::from($statePath)->toHtml() ?>,
                        textColors: <?php echo \Illuminate\Support\Js::from($getTextColorsForJs())->toHtml() ?>,
                        uploadingFileMessage: <?php echo \Illuminate\Support\Js::from($getUploadingFileMessage())->toHtml() ?>,
                        floatingToolbars: <?php echo \Illuminate\Support\Js::from($floatingToolbars)->toHtml() ?>,
                    })"
            x-bind:class="{
                'fi-fo-rich-editor-uploading-file': isUploadingFile,
            }"
            wire:ignore
            wire:key="<?php echo e($livewireKey); ?>.<?php echo e(substr(md5(serialize([
                    $isDisabled,
                ])), 0, 64)); ?>"
        >
            <!--[if BLOCK]><![endif]--><?php if((! $isDisabled) && filled($toolbarButtons)): ?>
                <div class="fi-fo-rich-editor-toolbar">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $toolbarButtons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $button => $buttonGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="fi-fo-rich-editor-toolbar-group">
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $buttonGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $button): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($tools[$button] ?? throw new LogicException("Toolbar button [{$button}] cannot be found.")); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <div
                x-show="isUploadingFile"
                x-cloak
                class="fi-fo-rich-editor-uploading-file-message"
            >
                <?php echo e(\Filament\Support\generate_loading_indicator_html()); ?>


                <span>
                    <?php echo e($getUploadingFileMessage()); ?>

                </span>
            </div>

            <div
                x-show="! isUploadingFile && fileValidationMessage"
                x-cloak
                class="fi-fo-rich-editor-file-validation-message"
            >
                <span
                    x-text="fileValidationMessage"
                    x-show="! isUploadingFile && fileValidationMessage"
                ></span>
            </div>

            <div
                <?php echo e($getExtraInputAttributeBag()->class(['fi-fo-rich-editor-main'])); ?>

            >
                <div class="fi-fo-rich-editor-content fi-prose" x-ref="editor">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $floatingToolbars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nodeName => $buttons): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div
                            x-ref="floatingToolbar::<?php echo e($nodeName); ?>"
                            class="fi-fo-rich-editor-floating-toolbar fi-not-prose"
                        >
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $buttons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $button): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($tools[$button]); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </div>

                <!--[if BLOCK]><![endif]--><?php if(! $isDisabled): ?>
                    <div
                        x-show="isPanelActive()"
                        x-cloak
                        class="fi-fo-rich-editor-panels"
                    >
                        <div
                            x-show="isPanelActive('customBlocks')"
                            x-cloak
                            class="fi-fo-rich-editor-panel"
                        >
                            <div class="fi-fo-rich-editor-panel-header">
                                <p class="fi-fo-rich-editor-panel-heading">
                                    <?php echo e(__('filament-forms::components.rich_editor.tools.custom_blocks')); ?>

                                </p>

                                <div
                                    class="fi-fo-rich-editor-panel-close-btn-ctn"
                                >
                                    <button
                                        type="button"
                                        x-on:click="togglePanel()"
                                        class="fi-icon-btn"
                                    >
                                        <?php echo e(\Filament\Support\generate_icon_html(\Filament\Support\Icons\Heroicon::XMark, alias: \Filament\Forms\View\FormsIconAlias::COMPONENTS_RICH_EDITOR_PANELS_CUSTOM_BLOCKS_CLOSE_BUTTON)); ?>

                                    </button>
                                </div>
                            </div>

                            <div class="fi-fo-rich-editor-custom-blocks-list">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $customBlocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $blockId = $block::getId();
                                    ?>

                                    <button
                                        draggable="true"
                                        type="button"
                                        x-data="{ isLoading: false }"
                                        x-on:click="
                                            isLoading = true

                                            $wire.mountAction(
                                                'customBlock',
                                                { editorSelection, id: <?php echo \Illuminate\Support\Js::from($blockId)->toHtml() ?>, mode: 'insert' },
                                                { schemaComponent: <?php echo \Illuminate\Support\Js::from($key)->toHtml() ?> },
                                            )
                                        "
                                        x-on:dragstart="$event.dataTransfer.setData('customBlock', <?php echo \Illuminate\Support\Js::from($blockId)->toHtml() ?>)"
                                        x-on:open-modal.window="isLoading = false"
                                        x-on:run-rich-editor-commands.window="isLoading = false"
                                        class="fi-fo-rich-editor-custom-block-btn"
                                    >
                                        <?php echo e(\Filament\Support\generate_loading_indicator_html((new \Illuminate\View\ComponentAttributeBag([
                                                'x-show' => 'isLoading',
                                            ])))); ?>


                                        <?php echo e($block::getLabel()); ?>

                                    </button>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>

                        <div
                            x-show="isPanelActive('mergeTags')"
                            x-cloak
                            class="fi-fo-rich-editor-panel"
                        >
                            <div class="fi-fo-rich-editor-panel-header">
                                <p class="fi-fo-rich-editor-panel-heading">
                                    <?php echo e(__('filament-forms::components.rich_editor.tools.merge_tags')); ?>

                                </p>

                                <div
                                    class="fi-fo-rich-editor-panel-close-btn-ctn"
                                >
                                    <button
                                        type="button"
                                        x-on:click="togglePanel()"
                                        class="fi-icon-btn"
                                    >
                                        <?php echo e(\Filament\Support\generate_icon_html(\Filament\Support\Icons\Heroicon::XMark, alias: \Filament\Forms\View\FormsIconAlias::COMPONENTS_RICH_EDITOR_PANELS_MERGE_TAGS_CLOSE_BUTTON)); ?>

                                    </button>
                                </div>
                            </div>

                            <div class="fi-fo-rich-editor-merge-tags-list">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $mergeTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tagId => $tagLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <button
                                        draggable="true"
                                        type="button"
                                        x-on:click="insertMergeTag(<?php echo \Illuminate\Support\Js::from($tagId)->toHtml() ?>)"
                                        x-on:dragstart="$event.dataTransfer.setData('mergeTag', <?php echo \Illuminate\Support\Js::from($tagId)->toHtml() ?>)"
                                        class="fi-fo-rich-editor-merge-tag-btn"
                                    >
                                        <span
                                            data-type="mergeTag"
                                            data-id="<?php echo e($tagId); ?>"
                                        >
                                            <?php echo e($tagLabel); ?>

                                        </span>
                                    </button>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal505efd9768415fdb4543e8c564dad437)): ?>
<?php $attributes = $__attributesOriginal505efd9768415fdb4543e8c564dad437; ?>
<?php unset($__attributesOriginal505efd9768415fdb4543e8c564dad437); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal505efd9768415fdb4543e8c564dad437)): ?>
<?php $component = $__componentOriginal505efd9768415fdb4543e8c564dad437; ?>
<?php unset($__componentOriginal505efd9768415fdb4543e8c564dad437); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Rygss\Downloads\smile-organization\vendor\filament\forms\resources\views/components/rich-editor.blade.php ENDPATH**/ ?>