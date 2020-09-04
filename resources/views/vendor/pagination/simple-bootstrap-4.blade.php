{{-- @if ($paginator->hasPages())
    <ul class="pagination" role="navigation"> --}}

        {{-- Previous Page Link --}}

        {{-- @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">@lang('pagination.previous')</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
            </li>
        @endif --}}

        {{-- Next Page Link --}}

        {{-- @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">@lang('pagination.next')</span>
            </li>
        @endif --}}

    {{-- </ul>
@endif --}}


@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="btn gradient-button gradient-button-4"><i class="fa fa-arrow-left"></i> Previous</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="btn gradient-button gradient-button-4"><i class="fa fa-arrow-left"></i> Previous</a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="btn gradient-button gradient-button-1">Next <i class="fa fa-arrow-right"></i></a>
        @else
            <a class="btn gradient-button gradient-button-1 disabled">Next <i class="fa fa-arrow-right"></i></a>
        @endif
    </ul>
@endif