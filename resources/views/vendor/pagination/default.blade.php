@if ($paginator->hasPages())
    <nav>
        <ul class="pagination" style="display: flex; justify-content: center;">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><button type="button"
                            class="btn btn-warning">{{ $element }}</button></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><button type="button" class="btn btn-warning mx-1"
                                    style="color: white; background-color: #F7941E; border: 1px solid black; border-radius: 10px;">{{ $page }}</button>
                            </li>
                        @else
                            <li><a href="{{ $url }}" class="btn btn-light mx-1"
                                    style="color: black; border: 1px solid black; border-radius: 10px;">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>

                    <button class="btn btn-light"
                        style="width: 100%; height: 100%;border: 1px solid black; border-radius: 10px;"
                        aria-label="@lang('pagination.next')">
                        <a style="color:black;" href="{{ $paginator->nextPageUrl() }}" rel="next">
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </button>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <button class="btn btn-light"
                        style="width: 100%; height: 100%;border: 1px solid black; border-radius: 10px;"
                        aria-hidden="true">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </li>
            @endif
        </ul>
    </nav>
@endif