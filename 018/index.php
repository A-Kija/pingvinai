<?php
// Ona
echo '<pre>';
require __DIR__ . '/Bebras.php';


$bebras1 = new Bebras('crimson');
$bebras2 = new Bebras('green');


print_r($bebras1);
print_r($bebras2);

echo '<h1>'. $bebras1->color  .'</h1>';
// echo '<h1>'. $bebras1->age  .'</h1>';


$bebras1->color = 'crimson';

$bebras1->setAge(38);
$bebras2->setAge(18);

// $bebras1->age = 888;

echo '<br>';
echo $bebras1->isHeAlive();
echo '<br>';
echo $bebras2->isHeAlive();
echo '<br>';


echo '<br>';
echo $bebras1->color();
echo '<br>';
echo $bebras2->color();
echo '<br>';


