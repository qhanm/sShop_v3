<?php
namespace Libs\DataTable\Traits;

trait ConfigurableTrait
{
    public function loadConfig(array $config = [])
    {
        $attributes = $this->attributes();
        foreach ($config as $key => $value){
            if(!in_array($key, $attributes)){
                continue;
            }

            $this->{$key} = $value;
        }
    }

    protected function attributes()
    {
        $class = new \ReflectionClass($this);

        $name = [];
        foreach ($class->getProperties() as $property){
            if(!$property->isStatic()){
                $name[] = $property->getName();
            }
        }

        return $name;
    }
}
