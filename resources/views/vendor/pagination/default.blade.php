@if ($paginator->hasPages())
    <nav aria-label=" Page navigation example">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled page-link rounded-circle mx-1">
                        <i class="fas fa-chevron-right"></i>
                   </li>
            @else
            <li class="page-item">
            <a class="page-link rounded-circle mx-1" href="{{ $paginator->previousPageUrl() }}">
                <i class="fas fa-chevron-right"></i>
            </a>
           </li>
               
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    {{-- <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li> --}}
                    {{-- <li class="disabled disabled page-link rounded-circle mx-1">
                        <span>{{ $element }}</span>
                        <i class="fas fa-chevron-right"></i>
                   </li> --}}
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link rounded-circle mx-1">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link rounded-circle mx-1"  href="{{ $url }}" >{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <li class="page-item">
                        <a class="page-link rounded-circle mx-1" href="{{ $paginator->nextPageUrl() }}">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                       </li>

                </li>
            @else
                <li class="disabled page-item ">
                    <a class="page-link rounded-circle mx-1" href="#">
                        <i class="fas fa-chevron-left"></i>
                    </a>
               </li>
            @endif
        </ul>
    </nav>
@endif
