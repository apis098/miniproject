@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            @else
                <li><a class="btn btn-warning rounded mx-5" style="background-color: #F7941E; color: white;" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    Selanjutnya
                </a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a class="btn btn-warning rounded mx-5" style="background-color: #F7941E; color: white;" href="{{ $paginator->nextPageUrl() }}" rel="next">Selanjutnya</a></li>
            @else
            @endif
        </ul>
    </nav>
@endif
