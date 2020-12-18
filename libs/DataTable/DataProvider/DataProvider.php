<?php
namespace Libs\DataTable\DataProvider;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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
    }

    public function get(): Collection
    {
        return $this->query->offset(($this->page - 1) * $this->perPage)
                            ->limit($this->perPage)->get() ?? new Collection();
    }

    public function selectionConditions(array $attributes, array $columnSort = [], array $columnFilter = []): void
    {

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
