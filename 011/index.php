<?php

// echo 'WHILE:<br>';
// $sk = rand(0, 10);
// while ($sk < 9) {
//    echo $sk . '<br>';
//    $sk = rand(0, 10);
// }

// echo 'DO WHILE:<br>';
// do {
//     $sk = rand(0, 10);
//     echo $sk . '<br>';
// } while ($sk < 9);

// echo 'FOR:<br>';
// for ($x = 1; $x <= 5; $x++) {
//     echo 'Numeris: '.$x.' <br>';
// }


    // for ($a = 1; $a <= 5; $a++) {

    //     echo '<b>Didžiojo ciklo Numeris: '.$a.' </b><br>';

    //     for ($x = 1; $x <= 5; $x++) {
    //         if ($x > 1) {
    //             break;
    //         }
    //         echo 'Mažojo Ciklo Numeris: '.$x.' <br>';
    //     }

    // }

echo '<pre>';
$mas1 = ['a' => 1, 'ddd' => 2, 3];

// array_push($mas1, 'Petras');
// $mas1[147] = 'Barsukas';
// $mas1[88] = 'Jonas';

$mas1['5.8888'] = 'Bebras';

// echo $mas1['5.7'];


// print_r($mas1);

// array_shift($mas1);
// array_unshift($mas1, 'Bebras');
// array_pop($mas1);




// echo "<h2>$index: <i>$value</i></h2>";

// $colors = ['red', 'green', 'blue', 'yellow'];

// foreach ($colors as &$value) {}

// unset($value);

// foreach ($colors as $value) {
//    echo 'Reikšmė: ' . $value . '<br>';
// }

// $a = 8;
// $b =& $a;
// $a++;

// echo "$a -- $b";


// print_r(range(40, 43));

// foreach (range(40, 43) as $go) {
//     echo 'Reikšmė: ' . $go . '<br>';
// }



print_r($mas1);

arsort($mas1);

$mas1['777'] = 'Zebras';

arsort($mas1);

print_r($mas1);

foreach($mas1 as $index => $value) {
    echo "<h2>$index: <i>$value</i></h2>";
}









 
 
