@php
    use Libs\DataTable\Helpers\UrlHelper;
    use Libs\DataTable\DataTable;
    use Libs\DataTable\Config;

    /** @var $paginator \Illuminate\Pagination\LengthAwarePaginator */
@endphp
<style>
    .pagination{
        display: inline-flex;
        display: -ms-flexbox;
        padding-left: 0;
        list-style: none;
        border-radius: .25rem;
    }
</style>
<div class="row">
    <div class="col-md-12" style="margin-top: 10px">
        <small>Show from {{ (($paginator->currentPage() - 1) * $paginator->perPage()) + 1 }} to {{ $paginator->currentPage() * $paginator->perPage() }} of <strong>{{ $paginator->total() }}</strong> items</small>

        @php
            $link_limit = 7;
        @endphp
        @if ($paginator->lastPage() > 1)
            <ul class="pagination float-right" >
                <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }} page-item">
                    <a href="{{
                                ($paginator->currentPage() == 1) ? 'javascript:void(0);' : UrlHelper::appendUrl(Config::$requestPage, 1, $request)
                            }}" class="page-link"><i class="fa fa-angle-double-left"></i></a>
                </li>
                <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }} page-item">
                    <a href="{{
                                ($paginator->currentPage() == 1) ? 'javascript:void(0);' : UrlHelper::appendUrl(Config::$requestPage, $paginator->currentPage() == 1 ? 1 : ($paginator->currentPage() - 1), $request)
                            }}" class="page-link"><i class="fa fa-angle-left"></i></a>
                </li>
                @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                    @php
                        $half_total_links = floor($link_limit / 2);
                        $from = $paginator->currentPage() - $half_total_links;
                        $to = $paginator->currentPage() + $half_total_links;
                        if ($paginator->currentPage() < $half_total_links) {
                            $to += $half_total_links - $paginator->currentPage();
                        }
                        if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                            $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                        }
                    @endphp
                    @if ($from < $i && $i < $to)
                        <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }} page-item">
                            <a href="{{ UrlHelper::appendUrl(Config::$requestPage, $i, $request) }}" class="page-link">{{ $i }}</a>
                        </li>
                    @endif
                @endfor
                <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }} page-item">
                    <a href="{{
                                ($paginator->currentPage() == $paginator->lastPage() ? 'javascript:void(0);' : UrlHelper::appendUrl(Config::$requestPage, ($paginator->currentPage() < $paginator->lastPage() ? $paginator->currentPage() + 1 : $paginator->lastPage()), $request))
                            }}" class="page-link"><i class="fa fa-angle-right"></i></a>
                </li>
                <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }} page-item">
                    <a href="{{
                                ($paginator->currentPage() == $paginator->lastPage() ? 'javascript:void(0);' : UrlHelper::appendUrl(Config::$requestPage, $paginator->lastPage() , $request))
                            }}" class="page-link"><i class="fa fa-angle-double-right"></i></a>
                </li>
            </ul>
        @endif
    </div>
</div>
