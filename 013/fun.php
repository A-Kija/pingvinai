<?php

function sudeti(int $vienas, int $du) : int
{
    
    $vienas = $vienas + $vienas;
    
    $rezultatas = $vienas + $du;
    return $rezultatas;
}



$vienas = 1;
$penki = 5;


  
echo sudeti($vienas, $penki);
echo '<br>';
echo $vienas;