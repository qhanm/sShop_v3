<?php
namespace Libs\DataTable;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Libs\DataTable\ColumnActions\BaseColumn;
use Libs\DataTable\ColumnActions\CallbackColumn;
use Libs\DataTable\ColumnActions\DefaultColumn;
use Libs\DataTable\DataProvider\DataProvider;
use Libs\DataTable\Traits\ConfigurableTrait;

class DataTable
{
    use ConfigurableTrait;

    /** @var $dataProvider DataProvider */
    protected $dataProvider;

    /** @var $columns array */
    protected $columns;

    /** @var $columnObjects array */
    protected $columnObjects = [];

    /** @var $request Request */
    protected $request;

    public function __construct(array $config)
    {
        $this->loadConfig($config);
        $this->request = $this->dataProvider->getRequest();
    }

    public function render()
    {
        $this->applyColumns();

        $this->dataProvider->selectionConditions($this->getAttribute(), $this->getColumnSort(), []);

        $totalCount = $this->dataProvider->getCount();

        $pageNumber = $this->request->get(Config::$requestPage, Config::$page);

        $perPage = $this->request->get(Config::$requestPerPage, Config::$perPage);

        $paginator = new LengthAwarePaginator(
            $this->dataProvider->get(),
            $totalCount,
            $perPage,
            $pageNumber,
            []
        );

        return view('datatable', [
            'columnObjects'         => $this->columnObjects,
            'paginator'             => $paginator,
            'request'               => $this->request
        ]);
    }

    public function applyColumns()
    {
        foreach ($this->columns as $column)
        {
            if(is_string($column)){
                $config = ['attribute' => $column, 'request' => $this->request];
                $this->fillColumnObject(new DefaultColumn($config));
            }elseif (is_array($column)){
                $config = array_merge($column, ['request' => $this->request]);

                if(isset($column['value']) && $column['value'] instanceof \Closure){
                    $this->fillColumnObject(new CallbackColumn($config));
                    continue;
                }

                $this->fillColumnObject(new DefaultColumn($config));
            }
        }
    }

    protected function fillColumnObject(BaseColumn $baseColumn)
    {
        $this->columnObjects = array_merge($this->columnObjects, [$baseColumn]);
    }

    protected function getColumnSort()
    {
        $columnSorts = [];
        Arr::where($this->columnObjects, function ($columnObject, $index) use(&$columnSorts) {
            if($columnObject->getSort() === true){
                $columnSorts[] = $columnObject->getAttribute();
            }
        });

        return $columnSorts;
    }

    protected function getAttribute()
    {
        $attributes = [];
        Arr::where($this->columnObjects, function ($value, $index) use(&$attributes){
            if($value->getAttribute() !== null){
                $attributes[] = $value->getAttribute();
            }
        });

        return $attributes;
    }
}
