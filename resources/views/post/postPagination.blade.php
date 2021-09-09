@if ($posts->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($posts->onFirstPage())
            <li class="disabled"><i class="material-icons">chevron_left</i></li>
        @else
            <li class="waves-effect"><a href="{{ $posts->previousPageUrl() }}"><i class="material-icons">chevron_left</i></a></li>
        @endif

        {{-- Pagination posts --}}
        @foreach ($posts as $post)
            {{-- "Three Dots" Separator --}}
            @if (is_string($post))
                <li class="disabled">{{ $post }}</li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($post))
                @foreach ($post as $page => $url)
                    @if ($page == $posts->currentPage())
                        <li class="active">
                            <a>{{ $page }}</a>
                        </li>
                    @else
                        <li class="waves-effect"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($posts->hasMorePages())
            <li class="waves-effect"><a href="{{ $posts->nextPageUrl() }}"><i class="material-icons">chevron_right</i></a></li>
        @else
            <li class="disabled"><a href="{{ $posts->nextPageUrl() }}"><i class="material-icons">chevron_right</i></a></li>
        @endif
    </ul>
@endif

