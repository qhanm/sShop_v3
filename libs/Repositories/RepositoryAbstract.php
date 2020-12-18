<?php
namespace Libs\Repositories;

use Libs\Repositories\Traits\RepositoryTrait;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Components\Model;

abstract class RepositoryAbstract implements RepositoryInterface
{
    use RepositoryTrait;

    /* @var $model Model **/
    protected $model;

    /* @var $resource JsonResource **/
    protected $resource;

    protected $columns;

    protected $table;

    public function __construct()
    {
        $this->setModel();
        $this->table = $this->model->getTable();
        $this->columns = $this->getColumns($this->table);
    }

    abstract function getModel();

    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    public function all(array $options = [], array $params = [])
    {
        $query = $this->model::query();

        if(isset($options['joinWith'])){
            $query = $query->with($this->parseToArray($options, 'joinWith'));
        }

        if(isset($options['select'])){
            $query = $query->select($this->parseToArray($options, 'select'));
        }

        return $query;
    }

    public function one($id, array $options = [])
    {
        // TODO: Implement one() method.
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.
    }

    public function findOrFail($id, array $options = [])
    {
        // TODO: Implement findOrFail() method.
    }

    public function delete($id, array $options = [])
    {
        // TODO: Implement delete() method.
    }

    public function destroy($id, array $options = [])
    {
        // TODO: Implement destroy() method.
    }
}
