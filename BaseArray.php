<?php

class BaseArray{
    private array $array = [];

    public function push(...$objects){ foreach($objects as $obj) $this->array[$obj[0]] = $obj[1];}

    public function remove($obj){ 
        if(!array_search($obj, $this->array)){
            throw new Exception("L'élélément : ".$obj." n'est pas présent dans array !");
        }
        unset($this->array[array_search($obj, $this->array)]);
    }

    public function getArray(){return $this->array;}

    public function flip(){
        foreach($this->array as $value)
        {
            $mykey = key($array);
            remove($this->array,$value);
            push($this->array,[$mykey, $value]);
        }
    }

    //noter
    //Effectuer un filtrage sur le tableau via $fn
    //Ne pas  modifier $this->array
    //retourner le filtre
    //faire les test aussi
    public function filter(callable $fn):array
}

