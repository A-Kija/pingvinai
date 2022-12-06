<?php



$pirmas = 'antras';
$antras = 'kitas';
$kitas = 'Bla bla';
echo $$$pirmas;

$mas = [8, 7, 9, 0, 1];
echo '<br>';
echo '<pre>';


// usort($mas, fn($a, $b) => $a <=> $b);

usort($mas, function($a, $b) {
    if ($a > $b) {
        return 1;
    }
    if ($a < $b) {
        return -1;
    }
    return 0;
});


print_r($mas);

$vienas = 5;


$rezultatas = 1 == $vienas ? 'Yes' : ( 2 == $vienas ? 'Maybe' : 'No' );

// 3 == $vienas ? f2() : f1();

echo '<br>';

echo $rezultatas;

echo '<br>';
var_dump(isset($i)); // gražina FALSE
$i=1;
var_dump(isset($i)); // gražina TRUE
// $i=null; 
var_dump(isset($i)); //gražina FALSE

var_dump($i ?? 8);



