<?php
namespace Libs\DataTable\DataProvider;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Libs\DataTable\Config;
use Libs\DataTable\Helpers\SortHelper;

class DataProvider extends AbstractDataProvider
{
    /** @var $query Builder */
    protected $query;

    /** @var $request Request */
    protected $request;

    /** @var $model Model */
    protected $model;

    public $page = 1;

    public $perPage = 20;

    public function __construct(Builder $query,Request $request)
    {
        $this->query = clone $query;
        $this->request = empty($request) ? new Request() : $request;
        $this->model = $this->query->getModel();
        $this->page = $this->request->get(Config::$requestPage, Config::$page);
        $this->perPage = $this->request->get(Config::$requestPerPage, Config::$perPage);
    }

    public function get(): Collection
    {
        return $this->query->offset(($this->page - 1) * $this->perPage)
                            ->limit($this->perPage)->get() ?? new Collection();
    }

    public function selectionConditions(array $attributes, array $columnSort = [], array $columnFilter = []): void
    {
        if(($column = $this->request->get(Config::$requestSort, null)))
        {
            if(in_array(SortHelper::getSortColumn($column), $columnSort)){
                $this->query->orderBy($this->model->getTable() . '.' . SortHelper::getSortColumn($column), SortHelper::getDirection($column));
            }
        }
    }

    public function getCount(): int
    {
        return $this->query->pluck($this->model->getTable() . '.' . $this->model->getKeyName())->count();
    }

    public function getRequest() : Request
    {
        return $this->request;
    }
}
