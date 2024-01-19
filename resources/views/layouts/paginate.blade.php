@if ($paginator->hasPages())
    <nav class="p-pagination">
        <ul class="page">
        <!-- 前へ移動ボタン -->
        @if ($paginator->onFirstPage())
            <li class="disabled">
                <img src="{{ asset('assets/img/page_before.png') }}" class="p-pagination__previous" >
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}">
                    <img src="{{ asset('assets/img/page_before.png') }}" class="p-pagination__previous" >
                </a>
            </li>
        @endif

        <!-- ページ番号　-->
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled">
                    {{ $element }}
                </li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active">
                            {{ $page }}
                        </li>
                    @else
                        <li class="active">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- 次へ移動ボタン -->
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}">
                    <img src="{{ asset('assets/img/page_next.png') }}" class="p-pagination__next">
                </a>
            </li>
        @else
            <li class="disabled">
                <img src="{{ asset('assets/img/page_next.png') }}" class="p-pagination__next" >
            </li>
        @endif
        </ul>
    </nav>
@endif 

