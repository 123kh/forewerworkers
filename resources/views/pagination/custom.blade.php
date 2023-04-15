
<div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
    @if ($paginator->onFirstPage())
    <a class="paginate_button previous disabled" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="-1" id="DataTables_Table_0_previous">Previous</a>
    @else
    <a class="paginate_button previous disabled" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="-1" id="DataTables_Table_0_previous" href="{{ $paginator->previousPageUrl() }}">Previous</a>
    @endif

    @foreach ($elements as $element)
    @if (is_string($element))
    <a class="paginate_button disabled" aria-controls="DataTables_Table_0" data-dt-idx="{{ $element }}" tabindex="0">{{ $element }}</a>
    @endif
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <a class="paginate_button current active" aria-controls="DataTables_Table_0" data-dt-idx="{{ $page }}" tabindex="0">{{ $page }}</a>
    @else
    <a class="paginate_button disabled" href="{{ $url }}" aria-controls="DataTables_Table_{{ $page }}" data-dt-idx="{{ $page }}" tabindex="0">{{ $page }}</a>
    @endif
    @endforeach
    @endif
    @endforeach

    @if ($paginator->hasMorePages())
    <a class="paginate_button next" aria-controls="DataTables_Table_0" data-dt-idx="6" tabindex="0" id="DataTables_Table_0_next" href="{{ $paginator->nextPageUrl() }}" >Next</a>
    @else
    <a class="paginate_button next disabled" aria-controls="DataTables_Table_0" data-dt-idx="6" tabindex="0" id="DataTables_Table_0_next" href="{{ $paginator->nextPageUrl() }}" >Next</a>
    @endif
</div>
