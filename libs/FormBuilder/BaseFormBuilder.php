<?php
/**
 * @author nam.quach <qhnam.67@gmail.com>
 */

namespace Libs\FormBuilder;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ViewErrorBag;
use Libs\FormBuilder\Exceptions\TypeInvalidException;
use Libs\FormBuilder\Traits\HtmlTrail;

abstract class BaseFormBuilder
{
    use HtmlTrail;

    protected $view = 'input';

     protected $checkboxView = 'checkbox';

    protected $optionLabel = ['class' => ''];

    protected $optionInput = ['class' => 'form-control'];

    protected $optionSelect = ['class' => 'form-control'];

    protected $optionButton = ['class' => 'btn'];

    protected $label;

    protected $session;

    protected $type = ['button', 'checkbox', 'color', 'date', 'datetime-local', 'email', 'file', 'hidden', 'image', 'month',
        'number', 'password', 'radio', 'range', 'reset', 'search', 'submit', 'tel', 'text', 'time', 'url', 'url', 'week',
        'textarea'
    ];

    public static function  __callStatic($method, $parameters)
    {
        return (new static)->$method(...$parameters);
    }

    protected function open(array $options = [])
    {
        $attributes = $this->buildAttributes($options);

        return $this->toHtmlString('<form '. $attributes .'>' . csrf_field());
    }

    protected function close()
    {
        return $this->toHtmlString('</form>');
    }

    public function qInput(string $type, string $name, string $value, array $options = [])
    {
        $input = $this->input($type, $name, $value, $options);
        return $this->render($this->label, $input, $name, $type);
    }

    protected function input(string $type, string $name, string $value, array $options = [])
    {
        if(!in_array($type, $this->type)){
            throw new TypeInvalidException('Type invalid');
        }

        $options = $this->mergeArray($options, $this->optionInput, ['type', 'name', 'value']);

        /***
         * @var $errors ViewErrorBag
         */
        $errors = request()->session()->get('errors');


        if(!empty($errors) && $errors->has($name)){
            $options['class'] = isset($options['class'])? $options['class'] . ' parsley-error': 'parsley-error';
        }

        $session = request()->session()->getOldInput();

        if(isset($session[$name])){
            $value = $session[$name];
        }

        $attributes = $this->buildAttributes($options);

        return $this->toHtmlString('<input type="'. $type .'" name="'. $name .'" id="'. $name .'" value="'. $value .'" '. $attributes .'/>');
    }

    protected function label(string $forAttribute, string $name, array $options = [])
    {
        $options = $this->mergeArray($options, $this->optionLabel, ['for']);

        $attributes = $this->buildAttributes($options);
        $this->label = $this->toHtmlString('<label for="'.$forAttribute.'" '. $attributes .'>'. $name .'</label>');
        return $this;
    }

    public function qSelect(string $name, array $data, string $value, array $options = [])
    {
        $select = $this->select($name, $data, $value, $options);
        return $this->render($this->label, $select, $name, '');
    }

    protected function select(string $name, array $data, string $value,array $options = [])
    {

        $options = $this->mergeArray($options, $this->optionSelect, ['name']);

        $attributes = $this->buildAttributes($options);

        $selectOptions = '';
        foreach($data as $key => $_option)
        {
            if($value == $key){
                $selectOptions .= '<option value="'. $key .'" selected="selected">'. $_option .'</option>';
            }else{
                $selectOptions .= '<option value="'. $key .'">'. $_option .'</option>';
            }
        }

        return $this->toHtmlString('<select name="'.$name.'" '. $attributes .'>'. $selectOptions .'</select>');
    }

    protected function render($label, $input, $name, $type)
    {
        $view = $this->view;
        if(in_array($type, ['checkbox', 'radio'])){
            $view = $this->checkboxView;
        }
        //dd(View::exists($this->view));
        return view($view, [
            'label' => $label,
            'input' => $input,
            'name' => $name,
        ]);
    }

    protected function button(string $type, string $name, array $options = [])
    {
        $options = $this->mergeArray($options, $this->optionButton, ['type']);

        $attributes = $this->buildAttributes($options);

        return $this->toHtmlString('<button type="'.$type.'" '. $attributes .'>'.$name.'</button>');
    }

    protected function mergeArray(array $options, array $optionDefault,array $except = [])
    {
        if(!empty($except)){
            $options = Arr::except($options, $except);
        }

        $options = array_merge($optionDefault, $options);

        if(isset($options['class']))
        {
            $arrOption = explode(' ', $options['class']);
            foreach(explode(' ', $optionDefault['class']) as $key => $value){
                if(!in_array($value, $arrOption)){
                    $arrOption[] = $value;
                }
            }

            $options['class'] = implode(' ', $arrOption);
        }

        return $options;
    }
}
