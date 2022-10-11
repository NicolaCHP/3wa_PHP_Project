<?php
//Créez une fonction mapped avec trois arguments glue, array et symbol.
//Voyez l'exemple ci-dessous. Elle permettra de rassembler les clés et les valeurs dans une chaîne de caractères.

function mapped(array $numbers, string $glue, string $symbol):string{
    
    if($numbers == []) return "La liste de nombre est vide.";
    $res = '';
    foreach($numbers as $key => $number){
        $res .= $key." ".$symbol." ".$number.$glue;
    }
                         //On supprime le glue à la fin
    return substr($res,0,strlen($glue)*-1);
}
// why not using next?
$result = mapped(numbers: ['x' => 1, 'y' => 2, 'z' => 3, 't' => 7], glue : ', ', symbol : "=");
var_dump($result === 'x = 1, y = 2, z = 3, t = 7');