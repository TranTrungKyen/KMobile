@if ($paginator->hasPages())
    <div class="col-12 pb-1">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center mb-3">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled">
                        <div class="page-link">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </div>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                @endif
                {{-- Elements --}}
                @foreach ($elements as $element)
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            {{-- Always show the first two pages --}}
                            @if ($page < 3)
                                <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @elseif (($page == $paginator->currentPage() - 2 || $page == $paginator->currentPage() + 2) && $page != $paginator->lastPage())
                                <li class="page-item disabled"><span class="page-link"><i
                                            class="fa fa-ellipsis-h"></i></span></li>
                                {{-- Show pages around the current page --}}
                            @elseif ($page >= $paginator->currentPage() - 1 && $page <= $paginator->currentPage() + 1)
                                <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                                {{-- Show the last page --}}
                            @elseif ($page == $paginator->lastPage())
                                <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                {{-- Elements --}}
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <div class="page-link">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </div>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif
