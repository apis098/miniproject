@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            @else
                <li><button class="btn btn-warning mx-5" 
                    style="background-color: #f39c12; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px;"
                    >
                    <a href="{{ $paginator->previousPageUrl() }}" style="color: white;" rel="prev">Selanjutnya</a>
                </button></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><button class="btn btn-warning mx-5" 
                    style="background-color: #f39c12; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px;"

                    >
                    <a href="{{ $paginator->nextPageUrl() }}" style="color: white;" rel="next">Selanjutnya</a>
                </button></li>
            @else
            @endif
        </ul>
    </nav>
@endif
