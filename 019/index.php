<?php
echo '<pre>';

require __DIR__ . '/Miskas.php';
require __DIR__ . '/Zveris.php';
require __DIR__ . '/Briedis.php';



$briedis1 = new Briedis('crimson');
$briedis2 = new Briedis('green');

echo $briedis1->color = 'yellow';

echo '<br>';
echo $briedis1->blabla;
echo '<br>';

// echo $briedis1;

echo $briedis1('GERAS'); 

print_r($briedis1);
print_r($briedis2);