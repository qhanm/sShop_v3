<?php
namespace Libs\DataTable\Helpers;

class StringHelper
{
    public static function convertAttributeToTitle(string $attribute)
    {
        $arrAttribute = explode('_', $attribute);
        $attribute = '';
        foreach ($arrAttribute as $char){
            if(trim($char) !== ''){
                $attribute .= ' ' . ucfirst(trim($char));
            }
        }

        return $attribute;
    }
}
