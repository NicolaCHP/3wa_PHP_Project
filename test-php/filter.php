<?php

class BaseArray{
    private array $array = [];

    public function add($key, $element){
        $this->array[$key]=$element;
    }

    //Effectuer un filtrage sur le tableau via $fn
    //Ne pas  modifier $this->array
    //retourner le filtre
    //faire les test aussi
    public function filter(callable $fn):array{
        $res = [];
        foreach($this->array as $key => $value){
            if($fn($value)){
                $res[$key] = $value;
            }
        }
        return $res;
    }
}

function impair($var)
{
    // retourne si l'entier en entrée est impair
    return $var & 1;
}

function pair($var)
{
    // retourne si l'entier en entrée est pair
    return !($var & 1);
}

#region test

//Dans le cas ou $fruits est vide
$fruits = new BaseArray();
$result = $fruits->filter("pair");
var_dump($result === []);

//Dans le cas où un élément correspond
$fruits->add("second",2);
$result = $fruits->filter("pair");
var_dump($result === ["second"=> 2]);

//Dans le cas où aucun correspond
$result = $fruits->filter("impair");
var_dump($result === []);

//Dans le cas ou plusieurs éléménts correspondent
$fruits->add("first",1);
$fruits->add("third",3);
$result = $fruits->filter("impair");
var_dump($result === ["first"=> 1,"third"=> 3]);

#end region
