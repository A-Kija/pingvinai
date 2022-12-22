<?php

require __DIR__ . '/Medziaga.php';
require __DIR__ . '/Kiauras.php';
require __DIR__ . '/Duobe.php';
require __DIR__ . '/Kibiras1.php';


$k1 = new Kibiras1(0, 'green');
$k2 = new Kibiras1(100, 'skyblue');
$k3 = new Kibiras1(0, 'black');


$k2->prideti1Akmeni();
$k3->prideti1Akmeni();
$k2->prideti1Akmeni();
$k3->prideti1Akmeni();
$k2->prideti1Akmeni();


$k1->pridetiDaugAkmenu(8);
$k1->prideti1Akmeni();

$k3->ispilti([]);

$k1->kiekPririnktaAkmenu();
$k2->kiekPririnktaAkmenu();
$k3->kiekPririnktaAkmenu();

var_dump($k2 instanceof Kiauras);