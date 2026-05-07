@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex flex-wrap items-center justify-center gap-4 my-12">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <span class="w-12 h-12 flex-shrink-0 flex items-center justify-center rounded-full bg-emerald-900/10 text-emerald-900/20 cursor-not-allowed border border-emerald-900/5">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="w-12 h-12 flex-shrink-0 flex items-center justify-center rounded-full bg-emerald-900 text-white hover:bg-lime-500 hover:scale-110 shadow-lg transition-all duration-300 group">
            <svg class="w-6 h-6 transition-transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <span class="w-12 h-12 flex-shrink-0 flex items-center justify-center text-emerald-900 font-black text-xl">{{ $element }}</span>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="w-12 h-12 flex-shrink-0 flex items-center justify-center rounded-full bg-lime-500 text-emerald-950 font-black text-lg shadow-xl shadow-lime-500/30 ring-4 ring-lime-500/20 z-10">
                        {{ $page }}
                    </span>
                @else
                    <a href="{{ $url }}" class="w-12 h-12 flex-shrink-0 flex items-center justify-center rounded-full bg-emerald-900 text-white hover:bg-lime-500 hover:text-emerald-950 hover:scale-110 shadow-lg transition-all duration-300 font-bold text-lg">
                        {{ $page }}
                    </a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="w-12 h-12 flex-shrink-0 flex items-center justify-center rounded-full bg-emerald-900 text-white hover:bg-lime-500 hover:scale-110 shadow-lg transition-all duration-300 group">
            <svg class="w-6 h-6 transition-transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    @else
        <span class="w-12 h-12 flex-shrink-0 flex items-center justify-center rounded-full bg-emerald-900/10 text-emerald-900/20 cursor-not-allowed border border-emerald-900/5">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </span>
    @endif
</nav>
@endif
