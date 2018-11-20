@if ($paginator->hasPages())
    <div class="inline-flex items-center shadow rounded">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span
                class="rounded-l rounded-l-sm border border-grey-light text-grey-dark px-3 py-2 cursor-not-allowed no-underline select-none">@lang('pagination.previous')</span>
        @else
            <a
                class="rounded-l rounded-l-sm border-t border-b border-l border-grey-light px-3 py-2 text-grey-darker bg-white hover:bg-grey-lighter no-underline select-none"
                href="{{ $paginator->previousPageUrl() }}"
                rel="prev"
            >
                @lang('pagination.previous')
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span
                    class="border-t border-b border-l border-grey-light px-3 py-2 cursor-not-allowed no-underline select-none">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span
                            class="border-t border-b border-l border-grey-light px-3 py-2 bg-grey-light no-underline select-none">{{ $page }}</span>
                    @else
                        <a class="border-t border-b border-l border-grey-light px-3 py-2 bg-white hover:bg-grey-lighter text-grey-darker no-underline select-none"
                           href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="rounded-r rounded-r-sm border border-grey-light px-3 py-2 bg-white hover:bg-grey-lighter text-grey-darker no-underline select-none"
               href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
        @else
            <span
                class="rounded-r rounded-r-sm border border-grey-light px-3 py-2 text-grey-dark no-underline cursor-not-allowed select-none">@lang('pagination.next')</span>
        @endif
    </div>
@endif
