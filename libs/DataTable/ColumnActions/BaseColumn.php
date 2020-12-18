<?php
namespace Libs\DataTable\ColumnActions;

use Illuminate\Http\Request;
use Libs\DataTable\Helpers\StringHelper;
use Libs\DataTable\Traits\ConfigurableTrait;

abstract class BaseColumn
{
    use ConfigurableTrait;

    /** @var $type string | null */
    protected $type = null;

    /** @var $attribute string | null */
    protected $attribute = null;

    /** @var $label string | null */
    protected $label = null;

    /** @var $filter boolean */
    protected $filter = true;

    /** @var $sort boolean */
    protected $sort = true;

    /** @var $format string | null */
    protected $format = null;

    /** @var $options array */
    protected $options = [];

    /** @var $value string | array | \Closure */
    protected $value;

    public function __construct(array $config = [])
    {
        $this->loadConfig($config);
    }

    abstract public function getValue($row);

    public function getLabel()
    {
        if($this->label === null){
            return StringHelper::convertAttributeToTitle($this->attribute);
        }
        return $this->label;
    }

    public function getFilter(){
        return $this->filter;
    }

    public function getSort() {
        return $this->sort;
    }

    public function getAttribute(){
        return $this->attribute;
    }


    public function render($row){
        return $this->getValue($row);
    }

    public function renderFilterInput()
    {
        return view('Filter.input', [
            'attribute' => $this->attribute,
        ]);
    }

    public function renderFilterDropdown()
    {

    }
}
