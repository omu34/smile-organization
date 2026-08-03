@extends('components.layouts.pages-layout')

@section('content')
<div class="bg-white pb-16">
    <!-- Main Article Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 lg:pt-12">
        <div class="flex flex-col lg:flex-row gap-12">

            <!-- Main Content Area -->
            <main class="w-full lg:w-2/3 xl:w-3/4">
                
                <!-- Category Tag Placeholder -->
                <div class="mb-4 flex items-center space-x-2">
                    <span class="bg-red-600 text-white text-xs font-bold uppercase tracking-wider py-1 px-3 rounded-sm">News</span>
                    <span class="text-sm text-gray-500 font-medium">{{ now()->format('F j, Y') }}</span>
                </div>

                <!-- Article Title -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight mb-6 tracking-tight">
                    {{ $article->title }}
                </h1>

                <!-- Author / Meta Row (Google News Style) -->
                <div class="flex items-center justify-between border-y border-gray-200 py-4 mb-8">
                    <div class="flex items-center space-x-3">
                        <div class="h-10 w-10 rounded-full bg-gray-200 overflow-hidden flex-shrink-0">
                            <!-- Placeholder avatar icon -->
                            <svg class="h-full w-full text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-900">System Admin</p>
                            <p class="text-xs text-gray-500">Author</p>
                        </div>
                    </div>
                    
                    <!-- Share Actions Placeholder -->
                    <div class="flex space-x-4">
                        <button class="text-gray-400 hover:text-red-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
                        </button>
                    </div>
                </div>

                <!-- Primary Media Presentation -->
                @if($article->primaryMedia)
                    @php($m = $article->primaryMedia)
                    <div class="mb-10 w-full overflow-hidden bg-gray-100 rounded-xl shadow-sm border border-gray-100">
                        @if($m->type === 'image')
                            <img src="{{ asset('storage/' . $m->file_path) }}" class="w-full h-auto object-cover max-h-[600px] hover:opacity-95 transition-opacity" alt="{{ $article->title }}">
                        @elseif($m->type === 'video_local')
                            <video controls class="w-full h-auto max-h-[600px] outline-none">
                                <source src="{{ asset('storage/' . $m->file_path) }}" type="video/mp4">
                            </video>
                        @elseif($m->type === 'youtube' && $m->youtube_id)
                            <div class="relative w-full" style="padding-top: 56.25%;">
                                <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $m->youtube_id }}" frameborder="0" allowfullscreen></iframe>
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Rich Text Body -->
                <article class="prose prose-lg md:prose-xl max-w-none text-gray-800 leading-relaxed 
                                prose-headings:font-bold prose-headings:text-gray-900 
                                prose-a:text-red-600 hover:prose-a:text-red-700 prose-a:no-underline hover:prose-a:underline
                                prose-img:rounded-xl prose-img:shadow-sm">
                    {!! $article->body !!}
                </article>
            </main>

            <!-- Sticky Sidebar -->
            <aside class="w-full lg:w-1/3 xl:w-1/4 hidden lg:block">
                <div class="sticky top-8">
                    <!-- Sidebar Module -->
                    <div class="border-t-4 border-red-600 bg-gray-50 p-6 rounded-b-lg shadow-sm">
                        <h3 class="text-lg font-black text-gray-900 mb-6 uppercase tracking-wide">More News</h3>
                        
                        <!-- Sidebar Items List Placeholder -->
                        <div class="space-y-6 divide-y divide-gray-200">
                            <!-- Dummy Item 1 -->
                            <a href="#" class="group block pt-2">
                                <h4 class="text-md font-bold text-gray-800 group-hover:text-red-600 transition-colors leading-snug">
                                    System updates and latest deployment strategies announced
                                </h4>
                                <p class="text-xs text-gray-500 mt-2 uppercase font-semibold">2 hours ago</p>
                            </a>

                            <!-- Dummy Item 2 -->
                            <a href="#" class="group block pt-4">
                                <h4 class="text-md font-bold text-gray-800 group-hover:text-red-600 transition-colors leading-snug">
                                    New features dropping in the upcoming release
                                </h4>
                                <p class="text-xs text-gray-500 mt-2 uppercase font-semibold">5 hours ago</p>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>

        </div>
    </div>
</div>
@endsection