<div class="relative bg-gradient-to-br from-blue-50 via-white to-purple-50 rounded-3xl shadow-xl border border-gray-200/50 p-8 lg:p-12 mb-8 mx-4 lg:mx-0 overflow-hidden">
    <!-- Background Decoration -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-bl from-blue-100/30 to-purple-100/30 rounded-full -translate-y-48 translate-x-48 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-gradient-to-tr from-green-100/20 to-yellow-100/20 rounded-full translate-y-40 -translate-x-40 blur-3xl"></div>
    
    <div class="relative z-10 flex flex-col lg:flex-row justify-between items-start gap-8 lg:gap-12">
        <!-- Left Section: Store Info -->
        <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 flex-1">
            <!-- Store Logo -->
            <div class="flex-shrink-0">
                <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-2xl bg-gradient-to-br from-white to-gray-50 overflow-hidden ring-4 ring-white/70 shadow-2xl border border-gray-100">
                    <!--[if BLOCK]><![endif]--><?php if($logo): ?>
                        <img src="<?php echo e($logo); ?>" alt="<?php echo e($storeName); ?>" class="w-full h-full object-cover">
                    <?php else: ?>
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-600 to-purple-600 text-white text-2xl font-bold">
                            <?php echo e(substr($storeName, 0, 2)); ?>

                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>

            <!-- Store Details -->
            <div class="flex-1 text-center sm:text-left space-y-6">
                <!-- Name & Description -->
                <div class="space-y-3">
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold bg-gradient-to-r from-gray-900 via-blue-800 to-purple-800 bg-clip-text text-transparent leading-tight">
                        <?php echo e($storeName); ?>

                    </h1>
                    <p class="text-gray-600 text-lg leading-relaxed max-w-2xl font-medium"><?php echo e($description); ?></p>
                </div>

                <!-- Contact Info & Hours in Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Contacts Card -->
                    <div class="bg-white/70 backdrop-blur-sm rounded-xl p-5 border border-gray-200/50 shadow-sm hover:shadow-md transition-all duration-200">
                        <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-4 flex items-center gap-2">
                            <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                            Contact Info
                        </h3>
                        <div class="space-y-3">
                            <!--[if BLOCK]><![endif]--><?php if($website): ?>
                                <div class="flex items-center gap-3 text-sm group cursor-pointer">
                                    <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                                        <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <a href="<?php echo e($website); ?>" target="_blank" class="text-blue-700 hover:text-blue-900 font-medium hover:underline transition-colors">
                                        <?php echo e(str_replace(['http://', 'https://'], '', $website)); ?>

                                    </a>
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            
                            <!--[if BLOCK]><![endif]--><?php if($phone): ?>
                                <div class="flex items-center gap-3 text-sm">
                                    <div class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                        </svg>
                                    </div>
                                    <a href="tel:<?php echo e($phone); ?>" class="text-gray-700 hover:text-green-600 font-medium transition-colors"><?php echo e($phone); ?></a>
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            
                            <!--[if BLOCK]><![endif]--><?php if($address): ?>
                                <div class="flex items-start gap-3 text-sm">
                                    <div class="flex-shrink-0 w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mt-0.5">
                                        <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 leading-relaxed font-medium"><?php echo e($address); ?></span>
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>

                    <!-- Opening Hours Card -->
                    <div class="bg-white/70 backdrop-blur-sm rounded-xl p-5 border border-gray-200/50 shadow-sm hover:shadow-md transition-all duration-200">
                        <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-4 flex items-center gap-2">
                            <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                            Opening Hours
                        </h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center text-sm">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 bg-blue-400 rounded-full"></div>
                                    <span class="font-semibold text-gray-800">Weekdays</span>
                                </div>
                                <span class="text-gray-700 font-mono bg-gray-50 px-2 py-1 rounded-lg"><?php echo e($weekdayHours); ?></span>
                            </div>
                            <div class="flex justify-between items-center text-sm">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 bg-purple-400 rounded-full"></div>
                                    <span class="font-semibold text-gray-800">Weekends</span>
                                </div>
                                <span class="text-gray-700 font-mono bg-gray-50 px-2 py-1 rounded-lg"><?php echo e($weekendHours); ?></span>
                            </div>
                            
                            <!-- Current Status Indicator -->
                            <div class="pt-2 border-t border-gray-200">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                    <span class="text-xs font-medium text-green-700">Currently Open</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Section: Store Banner -->
        <div class="flex-shrink-0 w-full lg:w-96">
            <div class="relative h-56 lg:h-72 rounded-2xl overflow-hidden shadow-xl border border-gray-200/50 bg-gradient-to-br from-gray-50 to-gray-100">
                <!--[if BLOCK]><![endif]--><?php if($banner): ?>
                    <img src="<?php echo e($banner); ?>" alt="Store Banner" class="w-full h-full object-cover">
                <?php else: ?>
                    <!-- Enhanced Placeholder -->
                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-100 via-purple-50 to-pink-100">
                        <div class="text-center space-y-4">
                            <div class="w-20 h-20 mx-auto bg-gradient-to-br from-blue-600 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-700 text-lg font-semibold"><?php echo e($storeName); ?></p>
                                <p class="text-gray-500 text-sm">Store Showcase</p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                
                <!-- Stylish Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/10 via-transparent to-transparent"></div>
                
                <!-- Premium Badge -->
                <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full shadow-md">
                    <span class="text-xs font-bold text-transparent bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text">PREMIUM</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Action Bar (Optional) -->
    <div class="relative z-10 mt-8 pt-6 border-t border-gray-200/50">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-4 text-sm text-gray-600">
                <div class="flex items-center gap-2">
                    <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                    <span class="font-medium">Verified Store</span>
                </div>
                <div class="h-4 w-px bg-gray-300"></div>
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <span class="font-medium">Premium Quality</span>
                </div>
            </div>
            
            <!-- Quick Action Buttons -->
            <div class="flex items-center gap-3">
                <!--[if BLOCK]><![endif]--><?php if($phone): ?>
                    <a href="tel:<?php echo e($phone); ?>" class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors duration-200 shadow-md hover:shadow-lg">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        Call Now
                    </a>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                
                <!--[if BLOCK]><![endif]--><?php if($website): ?>
                    <a href="<?php echo e($website); ?>" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-200 shadow-md hover:shadow-lg">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z" clip-rule="evenodd"/>
                        </svg>
                        Visit Site
                    </a>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>
</div><?php /**PATH /Users/madebykush/Desktop/Dev folders/accessory-page-clone/burner-supply-app/resources/views/livewire/store-card.blade.php ENDPATH**/ ?>