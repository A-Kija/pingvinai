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

echo 'FOR:<br>';
// for ($x = 1; $x <= 5; $x++) {
//     echo 'Numeris: '.$x.' <br>';
// }


    for ($a = 1; $a <= 5; $a++) {

        echo '<b>Didžiojo ciklo Numeris: '.$a.' </b><br>';

        for ($x = 1; $x <= 5; $x++) {
            if ($x == 2) {
                continue 2;
            }
            echo 'Mažojo Ciklo Numeris: '.$x.' <br>';
        }

    }


 
 
