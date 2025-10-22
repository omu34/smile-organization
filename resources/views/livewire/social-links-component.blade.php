@php
    use Illuminate\Support\Str;

    // Brand SVG map
    $icons = [
        'facebook' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M13 3h4a1 1 0 011 1v4h-3a1 1 0 00-1 1v3h4l-1 4h-3v7h-4v-7H9v-4h3V9a6 6 0 016-6z"/></svg>',
        'linkedin' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M4 3a2 2 0 110 4 2 2 0 010-4zm0 5h4v12H4V8zm7 0h4v2h.1a4.1 4.1 0 013.9-2c4.1 0 4.9 2.7 4.9 6.1V20h-4v-5.4c0-1.3 0-3-1.8-3s-2 1.4-2 2.9V20h-4V8z"/></svg>',
        'instagram' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm0 2h10c1.6 0 3 1.4 3 3v10c0 1.6-1.4 3-3 3H7c-1.6 0-3-1.4-3-3V7c0-1.6 1.4-3 3-3zm5 3a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6zm4.5-3a1 1 0 100 2 1 1 0 000-2z"/></svg>',
        'youtube' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M21.8 8s-.2-1.5-.8-2.1c-.8-.8-1.6-.8-2-1C16 4.5 12 4.5 12 4.5h-.1s-4 0-7 .4c-.4 0-1.2.2-2 1-.6.6-.8 2.1-.8 2.1S0 9.6 0 11.3v1.4c0 1.7.3 3.3.3 3.3s.2 1.5.8 2.1c.8.8 1.8.8 2.3.9 1.7.2 7.2.4 7.2.4s4 0 7-.4c.4 0 1.2-.2 2-1 .6-.6.8-2.1.8-2.1s.3-1.6.3-3.3v-1.4c0-1.7-.3-3.3-.3-3.3zM9.8 14.6V8.9l5.2 2.9-5.2 2.8z"/></svg>',
        'whatsapp' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M20 4.6A10 10 0 004 20l-1.7 5 5-1.6A10 10 0 1012 2a9.8 9.8 0 00-8 4.6zM12 21a9 9 0 01-4.7-1.3l-.3-.2-3 1 1-2.9-.2-.3A9 9 0 1112 21zm5.2-6.7c-.3-.1-1.8-.9-2.1-1-.3-.1-.5-.1-.7.2-.2.3-.8 1-.9 1.1-.2.1-.3.2-.6.1s-1.2-.4-2.3-1.3c-.9-.8-1.3-1.5-1.4-1.7-.1-.2 0-.4.1-.5.1-.1.3-.3.4-.4.1-.1.2-.3.3-.4.1-.2.1-.4 0-.5-.1-.1-.7-1.8-1-2.4-.3-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.7.3-.2.2-.9.9-.9 2.2 0 1.3 1 2.5 1.1 2.6.1.2 2 3.1 4.8 4.3 2.9 1.3 2.9.9 3.4.9.5 0 1.7-.7 1.9-1.3.2-.6.2-1.1.1-1.2-.1-.1-.3-.2-.6-.3z"/></svg>',
        'tiktok' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2c0 .4 0 .8.1 1.2.3 2.4 2 4.3 4.3 4.9v2.6c-1.6 0-3.1-.4-4.5-1.3v6.5c0 2-1.6 3.7-3.7 3.7S4.6 18 4.6 16s1.6-3.7 3.7-3.7c.3 0 .5 0 .8.1v2.6c-.3-.1-.5-.1-.8-.1-1.3 0-2.3 1-2.3 2.3S7 19.5 8.3 19.5s2.3-1 2.3-2.3V2h1.4z"/></svg>',
    ];
@endphp

<div wire:poll.30s="loadLinks" class="flex justify-center md:justify-start space-x-4 mt-6">
    @foreach ($links as $link)
        @php
            $iconName = strtolower($link->icon);
            $iconSvg = $icons[$iconName] ?? '<x-heroicon-o-globe-alt class="w-7 h-7" />';
        @endphp

        <a href="{{ $link->url }}" target="_blank" title="{{ $link->platform_name }}" class="hover:opacity-80" style="color: {{ $link->color }}">
            {!! $iconSvg !!}
        </a>
    @endforeach
</div>
