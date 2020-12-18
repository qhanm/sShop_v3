<?php
namespace Libs\Repositories\Traits;

use Illuminate\Support\Str;

trait RepositoryTrait
{

    /**
     * @param array $data
     * @param string $key
     * @return array
     */
    public function parseToArray(array $data, string $key)
    {
        return is_array($data[$key]) ? $data[$key] : [$data[$key]];
    }

    /**
     * @param string $attribute
     * @return array
     */
    public function detectSortOrder(string $attribute)
    {
        $sortOrder = 'asc';
        if(Str::is('-*', $attribute)){
            $sortOrder = 'desc';
            $attribute = Str::substr($attribute, 1, strlen($attribute));
        }
        return [
            'sortOrder' => $sortOrder,
            'attribute' => $attribute,
        ];
    }

    public function getColumns(string $table)
    {
        return \Schema::getColumnListing($table);
    }
}
