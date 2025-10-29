<div>
    <a href="{{ $link ?? '/' }}" target="_blank">
        @if ($logo)
            <img src="{{ $logo }}" alt="Site Logo" class="h-10 md:h-12 w-auto rounded-full">
        @else
            <span class="text-lg font-bold">MyShop</span>
        @endif
    </a>
</div>
