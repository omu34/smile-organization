@extends('components.layouts.pages-layout')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4">
    <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>

    @if($article->primaryMedia)
        @php($m = $article->primaryMedia)
        @if($m->type === 'image')
            <img src="{{ asset('storage/' . $m->file_path) }}" class="rounded-lg mb-6 w-full" alt="">
        @elseif($m->type === 'video_local')
            <video controls class="w-full rounded-lg mb-6">
                <source src="{{ asset('storage/' . $m->file_path) }}" type="video/mp4">
            </video>
        @elseif($m->type === 'youtube' && $m->youtube_id)
            <iframe class="w-full h-64 mb-6" src="https://www.youtube.com/embed/{{ $m->youtube_id }}" frameborder="0" allowfullscreen></iframe>
        @endif
    @endif

    <div class="prose max-w-none">
        {!! $article->body !!}
    </div>
</div>
@endsection
