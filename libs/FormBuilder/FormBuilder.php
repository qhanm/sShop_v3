<?php
/**
 * @author nam.quach <qhnam.67@gmail.com>
 */

namespace Libs\FormBuilder;

use Illuminate\Database\Eloquent\Model;
use Libs\FormBuilder\Traits\ModelTrait;

class FormBuilder extends BaseFormBuilder
{
    use ModelTrait;

    public function qActiveInput(string $type, Model $model, string $attribute, array $options = [])
    {
        $this->hasAttribute($model, $attribute);
        $input = $this->input($type, $attribute, $model->{$attribute}, $options);
        return $this->render($this->label, $input, $attribute, $type);
    }

    protected function activeInput(string $type,Model $model, string $attribute, array $options = [])
    {
        $this->hasAttribute($model, $attribute);
        return $this->input($type, $attribute, $model->{$attribute} == null ? '' : $model->{$attribute}, $options);
    }
}
