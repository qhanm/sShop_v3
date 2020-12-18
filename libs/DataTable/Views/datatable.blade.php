<?php
    use Libs\DataTable\Helpers\SortHelper;
    use Libs\DataTable\Config;

$hasFilter = \Illuminate\Support\Arr::where($columnObjects, function ($columnObject, $key) {
    return $columnObject->getFilter() == true;
});

?>

<table class="{!! \Libs\DataTable\Config::$tableClass !!}">
    <thead>
        @php /** @var $columnObject \Libs\DataTable\ColumnActions\BaseColumn */ @endphp
        @foreach($columnObjects as $columnObject)
            <th>
                @if($columnObject->getSort() === false)
                    {{ $columnObject->getLabel() }}
                @else
                    <?php
                        $sortResult = SortHelper::getSortableLink($request, $columnObject);
                    ?>
                    <a href="{{ $sortResult['url'] }}">
                        @if($sortResult['sortDirection'] === null)
                            {{ $columnObject->getLabel() }}
                        @elseif($sortResult['sortDirection'] === Config::$sortDirectionASC)
                            {{ $columnObject->getLabel() }} <i class="{{ Config::$iconSortAsc  }}"></i>
                        @elseif($sortResult['sortDirection'] == Config::$sortDirectionDESC)
                            {{ $columnObject->getLabel() }} <i class="{{ Config::$iconSortDesc  }}"></i>
                        @endif
                    </a>
                @endif
            </th>
        @endforeach
    </thead>
    <tbody>
        @if(count($hasFilter) > 0)
            <tr>
                @foreach($columnObjects as $columnObject)
                    <td>
                        @if($columnObject->getFilter() == true)
                            @if(count($columnObject->getDataDropdown()) == 0)
                                {!! $columnObject->renderFilterInput() !!}
                            @else
                                {!! $columnObject->renderFilterDropdown() !!}
                            @endif


                        @endif
                    </td>
                @endforeach
            </tr>

        @endif
        @php /** @var $paginator \Illuminate\Pagination\LengthAwarePaginator */ @endphp
        @foreach($paginator->items() as $key => $row)
            <tr>
                @foreach($columnObjects as $columnObject)
                    <td>
                        {!! $columnObject->render($row) !!}
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

@include('pagination', ['paginator' => $paginator, 'request' => $request])
