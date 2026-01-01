
<div class="mx-auto py-5 mb-5 px-4">
    {{-- @if ($areaTitle) --}}
        <div class="flex justify-start item-1 md:justify-center items-center flex-col md:py-4">
                <h2
                    class="font-bold text-xl md:text-3xl leading-tight mb-2 text-[#d13642]  rounded-md border-b-2 border-red-800 text-center md:text-left">
                    {{-- {{$areaTitle->title}} --}}AI Play Ground
                    {{-- <span class="text-indigo-900">Experience</span> --}}
                </h2>
                <h4
                    class="sm:text-lg md:text-xl  text-lg  font-medium text-gray-800 mt-4 tracking-wide  mx-auto max-w-lg ml-4 mr-4 md:ml-0 md:mr-0 text-center">
                    {{-- {{$areaTitle->description}} --}} Quick Access
                    
                </h4>
            </div>
            {{-- @else --}}
                {{-- <p class="text-gray-500 dark:text-gray-400">Footer info not available.</p> --}}
            {{-- @endif --}}

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">

        {{-- -------------------------------------------------------------- --}}
        {{-- 🤖 TEXT GENERATION --}}
        {{-- -------------------------------------------------------------- --}}
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

                @error('prompt')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror

                @if ($textResult)
                    <div class="mt-4 bg-white border rounded-2xl p-5 shadow space-y-2">
                        <p class="font-medium text-gray-800">AI Response</p>
                        <p class="text-gray-700 whitespace-pre-wrap">{!! nl2br(e($textResult)) !!}</p>
                    </div>
                @endif
            </div>

            {{-- BUTTON fixed at bottom --}}
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


        {{-- -------------------------------------------------------------- --}}
        {{-- 🖼️ IMAGE GENERATION --}}
        {{-- -------------------------------------------------------------- --}}
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

                @error('imagePrompt')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror

                @if ($generatedImage)
                    <div class="mt-4 bg-white border rounded-2xl overflow-hidden shadow">
                        <img src="{{ $generatedImage }}" class="w-full h-auto" />
                    </div>
                @endif

            </div>

            {{-- BUTTON fixed at bottom --}}
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


        {{-- -------------------------------------------------------------- --}}
        {{-- ✂️ IMAGE EDITING --}}
        {{-- -------------------------------------------------------------- --}}
        <div class="bg-gray-50 border rounded-2xl shadow p-6 hover:shadow-lg transition flex flex-col h-full">

            <h2 class="text-xl font-semibold mb-4 text-gray-800">Upload & Edit Image</h2>

            <div class="space-y-4 flex-grow">

                <label class="text-sm font-medium text-gray-600">Upload image</label>

                <div class="bg-white border rounded-2xl p-4 shadow-sm">
                    <input type="file" wire:model="uploadedImage"
                        class="w-full text-gray-600" />
                </div>

                @if ($uploadedImage)
                    <div class="mt-2 bg-white border rounded-2xl shadow p-3">
                        <img src="{{ $uploadedImage->temporaryUrl() }}"
                            class="max-h-40 rounded-lg mx-auto">
                    </div>
                @endif

                <label class="text-sm font-medium text-gray-600">Describe the edit</label>

                <div class="bg-white border rounded-2xl p-4 shadow-sm hover:shadow transition">
                    <input wire:model.defer="imagePrompt"
                        type="text"
                        class="w-full bg-transparent focus:outline-none"
                        placeholder="Replace background with a beach...">
                </div>

                @error('uploadedImage')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror

                @error('imagePrompt')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror

            </div>

            {{-- BUTTON fixed at bottom --}}
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

