<?php
/**
 * @author nam.quach <qhnam.67@gmail.com>
 */

namespace Libs\FormBuilder\Traits;

use Libs\FormBuilder\Exceptions\AttributeNotFoundException;

trait ModelTrait
{
    protected function hasAttribute($model, $attribute)
    {
        if(!in_array($attribute, $model->getAttributes())){
            throw new AttributeNotFoundException('Attribute '. $attribute .' not found in model ' . get_class($model));
        }
        return true;
    }
}
