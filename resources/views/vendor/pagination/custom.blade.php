@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-center gap-2">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <span class="w-10 h-10 flex items-center justify-center rounded-lg bg-emerald-800/30 text-emerald-400/50 cursor-not-allowed border border-emerald-600/20">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="w-10 h-10 flex items-center justify-center rounded-lg bg-emerald-800/50 text-emerald-200 hover:text-white hover:bg-emerald-700/50 border border-emerald-500/30 transition-all duration-200 hover:border-lime-400/50">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <span class="w-10 h-10 flex items-center justify-center text-emerald-300/70">{{ $element }}</span>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="w-10 h-10 flex items-center justify-center rounded-lg bg-gradient-to-br from-lime-500 to-emerald-600 text-emerald-950 font-semibold shadow-lg shadow-lime-500/20 border border-lime-400/50">
                        {{ $page }}
                    </span>
                @else
                    <a href="{{ $url }}" class="w-10 h-10 flex items-center justify-center rounded-lg bg-emerald-800/50 text-emerald-200 hover:text-white hover:bg-emerald-700/50 border border-emerald-500/30 transition-all duration-200 hover:border-lime-400/50">
                        {{ $page }}
                    </a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="w-10 h-10 flex items-center justify-center rounded-lg bg-emerald-800/50 text-emerald-200 hover:text-white hover:bg-emerald-700/50 border border-emerald-500/30 transition-all duration-200 hover:border-lime-400/50">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    @else
        <span class="w-10 h-10 flex items-center justify-center rounded-lg bg-emerald-800/30 text-emerald-400/50 cursor-not-allowed border border-emerald-600/20">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </span>
    @endif
</nav>
@endif
