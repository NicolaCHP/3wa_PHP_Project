<?php
/* Consigne:
    Créez une fonction qui prend en argument un tableau de nombres et une valeur entière donnant la position pour spliter
    le tableau en deux. Si la valeur de la position est supérieure à la longueur du tableau, retournez le.
    Vous pouvez utiliser la fonction array_shift de PHP pour dépiler le tableau.
 */

 function split_array(array $numbers, int $pos, bool $preserve = false): array{
    
    if($pos < count($numbers)*-1) return [[],$numbers];

    $numbers2  =array_slice($numbers,$pos,null,$preserve);
    $i=count($numbers);
    while($i > abs($pos)){
        array_pop($numbers);
        $i--;
    }
    if(!$preserve){
        $numbers1 = [];
        foreach($numbers as $number){ array_push($numbers1, $number);}
        return [$numbers1,$numbers2];
    }
    return [$numbers,$numbers2];

}


$result = split_array(numbers: [4,6,9, 17], pos : 3);
var_dump($result === [[4,6,9], [17]]);


$result = split_array(numbers: [4,6,9, 17], pos : -2);
var_dump($result === [[4,6] , [9, 17]]);

$result = split_array(numbers: [4,6,9, 17], pos : 20);
var_dump($result === [[4,6, 9, 17], []]);

$result = split_array(numbers: [4,6,9, 17], pos : -20);
var_dump($result === [[], [4,6, 9, 17]]);

$result = split_array(numbers: [2 => 4, 3 => 6], pos : 1);
var_dump($result === [[0 => 4], [0 => 6]]);

$result = split_array(numbers: [2 => 4, 3 => 6], pos : 1, preserve: true);
var_dump($result === [[2 => 4], [3 => 6]]);
