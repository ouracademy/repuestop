<?php namespace App\Interfaces\Serializables;


class Serializable
{

    public function toJson()
    {
        $array = (array) $this;
        array_walk_recursive($array, function (&$property) {
            if ($property instanceof $this) {
                $property = $property->toArray();
            }
        });
        return $array; 
    }  
}
