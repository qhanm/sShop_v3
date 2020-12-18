<?php
namespace Libs\DataTable\ColumnActions;

class CallbackColumn extends BaseColumn
{
    public function getValue($row)
    {
        return call_user_func($this->value, $row) ?? '';
    }
}
