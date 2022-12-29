<?php

require __DIR__ . '/Grybas.php';
require __DIR__ . '/Krepsys.php';


$k = new Krepsys;


while($k->grybauti(new Grybas)){}


echo '<pre>';
print_r($k);