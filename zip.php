<?php
// Créez une fonction permettant de regrouper terme à terme les éléments de deux tableaux de dimension 1.
// Elle retournera un tableau de dimension 2 regroupant les éléments.

function zip(array $tab1, array $tab2):array{
    $i = 0;
    $res=[];
    while( $i < count($tab1) || $i < count($tab2)){
        if(!$tab1[$i]) array_push($res, [$tab2[$i]]);
        elseif(!$tab2[$i]) array_push($res, [$tab1[$i]]);
        else array_push($res, [$tab1[$i],$tab2[$i]]);
        $i++;
    }
    return $res;
}


$result = zip(tab1 : [1,2,3], tab2: [4,5,6]);
var_dump($result === [[1,4], [2,5], [3,6]]);

$result = zip(tab1 : [], tab2: []);
var_dump($result === []);

$result = zip(tab1 : [], tab2: [4,5,6]);
var_dump($result === [[4], [5], [6]]);
/*
$result = zip(tab1 : [4,5,6], tab2: []);
var_dump($result === [[4], [5], [6]]);

$result = zip(tab1 : [1,2,3,4], tab2: [4,5,6]);
var_dump($result === [[1,4], [2,5], [3, 6], [4]]);

$result = zip(tab1 : [1,2,3], tab2: [4,5,6,7,8]);
var_dump($result === [[1,4], [2,5], [3, 6], [7], [8]]);
*/