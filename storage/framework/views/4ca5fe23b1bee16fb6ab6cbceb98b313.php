<div class="bg-white py-16 lg:py-24" id="ai-playground" data-aos="fade-up" data-aos-duration="1000">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="flex flex-col items-center md:items-start text-center md:text-left mb-12">
            <!-- Accent Line -->
            <div class="hidden md:block h-1 w-16 bg-red-600 mb-4"></div>
            
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight mb-4 uppercase">
                AI Playground
            </h2>
            
            <h4 class="text-lg md:text-xl text-gray-600 max-w-2xl font-medium">
                Quick Access Tools
            </h4>
        </div>

        <!-- 3-Column Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            
            
            
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col h-full overflow-hidden">
                <!-- Top Accent Bar -->
                <div class="h-1 w-full bg-gray-900"></div>
                
                <div class="p-6 md:p-8 flex flex-col flex-grow">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">Text Generation</h2>
                        <span class="text-xl bg-gray-100 p-2 rounded-full">🤖</span>
                    </div>

                    <div class="space-y-5 flex-grow">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Your Prompt</label>
                            <textarea wire:model.defer="prompt"
                                class="w-full bg-gray-50 border border-gray-200 rounded-lg p-4 text-gray-900 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent transition-all resize-none"
                                rows="4"
                                placeholder="Ask me anything..."></textarea>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['prompt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-xs font-bold text-red-600 mt-2"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        <!-- Result Box (News Blockquote Style) -->
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($textResult): ?>
                            <div class="mt-4 bg-gray-50 border-l-4 border-red-600 p-5 rounded-r-lg shadow-inner">
                                <p class="text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">AI Response</p>
                                <p class="text-gray-800 whitespace-pre-wrap leading-relaxed"><?php echo nl2br(e($textResult)); ?></p>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-100">
                        <button wire:click="generateText" wire:loading.attr="disabled"
                            class="w-full flex justify-center items-center px-6 py-3 bg-gray-900 text-white text-sm font-bold uppercase tracking-wider rounded-lg hover:bg-red-600 transition-colors duration-300 disabled:bg-gray-300 disabled:cursor-not-allowed group">
                            
                            <span wire:loading.remove wire:target="generateText" class="flex items-center">
                                Send Prompt
                                <svg class="w-4 h-4 ml-2 transform transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </span>
                            
                            <span wire:loading wire:target="generateText" class="flex items-center">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.37 0 0 5.37 0 12h4zm2 5.29A7.96 7.96 0 014 12H0c0 3.04 1.14 5.82 3 7.94l3-2.65z"></path>
                                </svg>
                                Generating...
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            
            
            
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col h-full overflow-hidden">
                <div class="h-1 w-full bg-red-600"></div>
                
                <div class="p-6 md:p-8 flex flex-col flex-grow">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">Generate Image</h2>
                        <span class="text-xl bg-gray-100 p-2 rounded-full">🖼️</span>
                    </div>

                    <div class="space-y-5 flex-grow">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Describe Your Image</label>
                            <input wire:model.defer="imagePrompt"
                                type="text"
                                class="w-full bg-gray-50 border border-gray-200 rounded-lg p-4 text-gray-900 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent transition-all"
                                placeholder="A majestic lion wearing sunglasses...">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['imagePrompt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-xs font-bold text-red-600 mt-2"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        <!-- Image Result Container -->
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($generatedImage): ?>
                            <div class="mt-4 rounded-lg overflow-hidden border border-gray-200 shadow-sm bg-gray-100 aspect-square">
                                <img src="<?php echo e($generatedImage); ?>" class="w-full h-full object-cover" alt="Generated AI Image" />
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-100">
                        <button wire:click="generateImage" wire:loading.attr="disabled"
                            class="w-full flex justify-center items-center px-6 py-3 bg-red-600 text-white text-sm font-bold uppercase tracking-wider rounded-lg hover:bg-gray-900 transition-colors duration-300 disabled:bg-gray-300 disabled:cursor-not-allowed group">
                            
                            <span wire:loading.remove wire:target="generateImage" class="flex items-center">
                                Create Image
                                <svg class="w-4 h-4 ml-2 transform transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </span>

                            <span wire:loading wire:target="generateImage" class="flex items-center">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.37 0 0 5.37 0 12h4zm2 5.29A7.96 7.96 0 014 12H0c0 3.04 1.14 5.82 3 7.94l3-2.65z"></path>
                                </svg>
                                Rendering...
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            
            
            
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col h-full overflow-hidden">
                <div class="h-1 w-full bg-gray-900"></div>
                
                <div class="p-6 md:p-8 flex flex-col flex-grow">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">Edit Image</h2>
                        <span class="text-xl bg-gray-100 p-2 rounded-full">✂️</span>
                    </div>

                    <div class="space-y-5 flex-grow">
                        
                        <!-- File Upload -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Upload Image</label>
                            <input type="file" wire:model="uploadedImage"
                                class="w-full bg-gray-50 border border-gray-200 rounded-lg p-3 text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-bold file:uppercase file:tracking-wider file:bg-gray-200 file:text-gray-800 hover:file:bg-gray-300 transition-colors" />
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['uploadedImage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-xs font-bold text-red-600 mt-2"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($uploadedImage): ?>
                            <div class="rounded-lg overflow-hidden border border-gray-200 shadow-sm bg-gray-100 aspect-video">
                                <img src="<?php echo e($uploadedImage->temporaryUrl()); ?>" class="w-full h-full object-cover">
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <!-- Edit Prompt -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Describe The Edit</label>
                            <input wire:model.defer="imagePrompt"
                                type="text"
                                class="w-full bg-gray-50 border border-gray-200 rounded-lg p-4 text-gray-900 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent transition-all"
                                placeholder="Change the background to a beach...">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['imagePrompt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-xs font-bold text-red-600 mt-2"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-100">
                        <button wire:click="editImage" wire:loading.attr="disabled"
                            class="w-full flex justify-center items-center px-6 py-3 bg-gray-900 text-white text-sm font-bold uppercase tracking-wider rounded-lg hover:bg-red-600 transition-colors duration-300 disabled:bg-gray-300 disabled:cursor-not-allowed group">
                            
                            <span wire:loading.remove wire:target="editImage" class="flex items-center">
                                Submit Edit
                                <svg class="w-4 h-4 ml-2 transform transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </span>

                            <span wire:loading wire:target="editImage" class="flex items-center">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.37 0 0 5.37 0 12h4zm2 5.29A7.96 7.96 0 014 12H0c0 3.04 1.14 5.82 3 7.94l3-2.65z"></path>
                                </svg>
                                Processing...
                            </span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div><?php /**PATH F:\projects\smile-organization\resources\views\livewire\ai-playground.blade.php ENDPATH**/ ?>