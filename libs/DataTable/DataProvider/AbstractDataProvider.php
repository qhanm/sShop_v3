<?php
namespace Libs\DataTable\DataProvider;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

abstract class AbstractDataProvider
{
    abstract public function get(): Collection;

    abstract public function selectionConditions(array $attributes, array $columnSort = [], array $columnFilter = []) : void;

    abstract public function getCount() : int;

    abstract public function getRequest() : Request;
}
