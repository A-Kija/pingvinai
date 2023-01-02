<?php

require __DIR__ . '/Stikline.php';


$s100 = new Stikline(100);
$s150 = new Stikline(150);
$s200 = new Stikline(200);


$s100
->ipilti($s150
->ipilti($s200
->ipilti(1000)
->ispilti())
->ispilti());


echo '<pre>';

print_r($s100);
print_r($s150);
print_r($s200);