<?php
namespace Libs\DataTable\Helpers;

use Illuminate\Http\Request;
use Libs\DataTable\ColumnActions\BaseColumn;
use Libs\DataTable\Config;

class SortHelper
{
    public static function getSortColumn(string $column) : string
    {
        return str_replace('-', '', $column);
    }

    public static function getDirection(string $column) : string
    {
        $position = mb_stripos($column, '-');
        if($position === 0){
            return Config::$sortDirectionASC;
        }

        return Config::$sortDirectionDESC;
    }

    public static function getSortableLink(Request $request, BaseColumn $columnObject)
    {
        if($columnObject->getSort() === false){
            return '';
        }

        $sortColumn = $request->get(Config::$requestSort, null);

        if(is_null($sortColumn)){
            return [
                'url' => $request->fullUrlWithQuery([Config::$requestSort => $columnObject->getAttribute()]),
                'sortDirection' => null,
            ];
        }

        if($sortColumn == $columnObject->getAttribute()){
            return [
                'url' => $request->fullUrlWithQuery([Config::$requestSort => '-' . $sortColumn]),
                'sortDirection' => Config::$sortDirectionASC,
            ];
        }

        if($sortColumn == ('-' . $columnObject->getAttribute())){
            return [
                'url' => $request->fullUrlWithQuery([Config::$requestSort => $columnObject->getAttribute()]),
                'sortDirection' => Config::$sortDirectionDESC,
            ];
        }

        return [
            'url' => $request->fullUrlWithQuery([Config::$requestSort => $columnObject->getAttribute()]),
            'sortDirection' => null,
        ];
    }
}
