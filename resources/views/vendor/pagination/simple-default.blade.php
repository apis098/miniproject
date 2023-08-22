@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            @else
                <li><button class="btn btn-warning mx-5" style="background-color: #F7941E; color: white; border-radius: 12px;box-shadow: 0px 4px 4px black;">
                    <a href="{{ $paginator->previousPageUrl() }}" style="color: white;" rel="prev">Selanjutnya</a>
                </button></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><button class="btn btn-warning mx-5" style="background-color: #F7941E; color: white; border-radius: 12px;box-shadow: 0px 4px 4px black;">
                    <a href="{{ $paginator->nextPageUrl() }}" style="color: white;" rel="next">Selanjutnya</a>
                </button></li>
            @else
            @endif
        </ul>
    </nav>
@endif
