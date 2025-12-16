
<div class="mx-auto py-5 mb-5 px-4">
    <h1 class="text-2xl font-bold py-5 text-center">AI Playground</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">

        
        
        
        <div class="bg-gray-50 border rounded-2xl shadow p-6 hover:shadow-lg transition flex flex-col h-full">

            <h2 class="text-xl font-semibold mb-4 text-gray-800">Generate Text</h2>

            <div class="space-y-4 flex-grow">
                <label class="text-sm font-medium text-gray-600">Your prompt</label>

                <div class="bg-white border rounded-2xl p-4 shadow-sm hover:shadow transition">
                    <textarea wire:model.defer="prompt"
                        class="w-full bg-transparent focus:outline-none resize-none"
                        rows="3"
                        placeholder="Send a message..."></textarea>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['prompt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-sm text-red-600"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($textResult): ?>
                    <div class="mt-4 bg-white border rounded-2xl p-5 shadow space-y-2">
                        <p class="font-medium text-gray-800">AI Response</p>
                        <p class="text-gray-700 whitespace-pre-wrap"><?php echo nl2br(e($textResult)); ?></p>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <div class="flex justify-end mt-auto pt-4">
                <button wire:click="generateText" wire:loading.attr="disabled"
                    class="px-5 py-2 rounded-xl bg-black text-white hover:bg-gray-800 transition disabled:bg-gray-400 flex items-center">

                    <span wire:loading.remove wire:target="generateText">Send</span>

                    <span wire:loading wire:target="generateText" class="flex items-center">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.37 0 0 5.37 0 12h4zm2 5.29A7.96 7.96 0 014 12H0c0
                                3.04 1.14 5.82 3 7.94l3-2.65z"></path>
                        </svg>
                        Sending...
                    </span>
                </button>
            </div>

        </div>


        
        
        
        <div class="bg-gray-50 border rounded-2xl shadow p-6 hover:shadow-lg transition flex flex-col h-full">

            <h2 class="text-xl font-semibold mb-4 text-gray-800">Generate Image</h2>

            <div class="space-y-4 flex-grow">

                <label class="text-sm font-medium text-gray-600">Describe your image</label>

                <div class="bg-white border rounded-2xl p-4 shadow-sm hover:shadow transition">
                    <input wire:model.defer="imagePrompt"
                        type="text"
                        class="w-full bg-transparent focus:outline-none"
                        placeholder="A majestic lion wearing sunglasses...">
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['imagePrompt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-sm text-red-600"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($generatedImage): ?>
                    <div class="mt-4 bg-white border rounded-2xl overflow-hidden shadow">
                        <img src="<?php echo e($generatedImage); ?>" class="w-full h-auto" />
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            </div>

            
            <div class="flex justify-end mt-auto pt-4">
                <button wire:click="generateImage" wire:loading.attr="disabled"
                    class="px-5 py-2 rounded-xl bg-black text-white hover:bg-gray-800 transition disabled:bg-gray-400 flex items-center">

                    <span wire:loading.remove wire:target="generateImage">Generate</span>

                    <span wire:loading wire:target="generateImage" class="flex items-center">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.37 0 0 5.37 0 12h4zm2 5.29A7.96 7.96 0 014 12H0c0
                                3.04 1.14 5.82 3 7.94l3-2.65z"></path>
                        </svg>
                        Creating...
                    </span>
                </button>
            </div>

        </div>


        
        
        
        <div class="bg-gray-50 border rounded-2xl shadow p-6 hover:shadow-lg transition flex flex-col h-full">

            <h2 class="text-xl font-semibold mb-4 text-gray-800">Upload & Edit Image</h2>

            <div class="space-y-4 flex-grow">

                <label class="text-sm font-medium text-gray-600">Upload image</label>

                <div class="bg-white border rounded-2xl p-4 shadow-sm">
                    <input type="file" wire:model="uploadedImage"
                        class="w-full text-gray-600" />
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($uploadedImage): ?>
                    <div class="mt-2 bg-white border rounded-2xl shadow p-3">
                        <img src="<?php echo e($uploadedImage->temporaryUrl()); ?>"
                            class="max-h-40 rounded-lg mx-auto">
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <label class="text-sm font-medium text-gray-600">Describe the edit</label>

                <div class="bg-white border rounded-2xl p-4 shadow-sm hover:shadow transition">
                    <input wire:model.defer="imagePrompt"
                        type="text"
                        class="w-full bg-transparent focus:outline-none"
                        placeholder="Replace background with a beach...">
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['uploadedImage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-sm text-red-600"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['imagePrompt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-sm text-red-600"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            </div>

            
            <div class="flex justify-end mt-auto pt-4">
                <button wire:click="editImage" wire:loading.attr="disabled"
                    class="px-5 py-2 rounded-xl bg-black text-white hover:bg-gray-800 transition disabled:bg-gray-400 flex items-center">

                    <span wire:loading.remove wire:target="editImage">Submit Edit</span>

                    <span wire:loading wire:target="editImage" class="flex items-center">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.37 0 0 5.37 0 12h4zm2 5.29A7.96 7.96 0 014 12H0c0
                                3.04 1.14 5.82 3 7.94l3-2.65z"></path>
                        </svg>
                        Editing...
                    </span>
                </button>
            </div>

        </div>

    </div>
</div>

<?php /**PATH C:\Users\Rygss\Downloads\smile-with-ai\resources\views/livewire/ai-playground.blade.php ENDPATH**/ ?>