@if ($paginator->hasPages())
    <div class="pager_wrapper prs_blog_pagi_wrapper">
    <ul class="pagination">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <li class="btc_shop_pagi disabled hide"><a href="#"><i class="flaticon-left-arrow"></i></a></li>
        @else
            <li><a class="btc_shop_pagi" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="flaticon-left-arrow"></i></a></li>
        @endif

    <!-- Pagination Elements -->
        @foreach ($elements as $element)
        <!-- "Three Dots" Separator -->
            @if (is_string($element))
                <li class="btc_shop_pagi disabled">{{ $element }}</li>
            @endif

        <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="btc_third_pegi btc_shop_pagi active"><a href="#">{{ $page }}</a></li>
                    @else
                        <li><a class="btc_third_pegi btc_shop_pagi" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

    <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <li><a class="btc_shop_pagi" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="flaticon-right-arrow"></i></a></li>
        @else
            <li class="btc_shop_pagi disabled hide"><a href="#"><i class="flaticon-right-arrow"></i></a></li>
        @endif
    </ul>
    </div>
@endif