@if ($paginator->hasPages())
    <ul class="inline-flex list-reset text-green-darker font-bold shadow rounded">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled">
                <span
                    class="inline-flex items-center button bg-transparent border border-r-0 border-grey py-2 px-4 rounded-l opacity-50 cursor-not-allowed">@lang('pagination.previous')</span>
            </li>
        @else
            <li>
                <a class="inline-flex items-center button text-green-darker hover:bg-grey-lighter bg-transparent border border-r-0 border-grey py-2 px-4 rounded-l opacity-85 no-underline"
                   href="{{ $paginator->previousPageUrl() }}"
                   rel="prev">@lang('pagination.previous')</a>
            </li>
        @endif
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a class="inline-flex items-center button text-green-darker hover:bg-grey-lighter bg-transparent border border-grey py-2 px-4 rounded-r opacity-85 no-underline"
                   href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
            </li>
        @else
            <li class="disabled ">
                <span
                    class="inline-flex items-center button bg-transparent border border-grey py-2 px-4 rounded-r opacity-50 cursor-not-allowed">@lang('pagination.next')</span>
            </li>
        @endif
    </ul>
@endif
