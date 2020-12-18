<?php
namespace Libs\DataTable\ColumnActions;

class DefaultColumn extends BaseColumn
{
    public function getValue($row){
        return $row->{ $this->attribute } ?? '';
    }
}
