<?php


require __DIR__ . '/Kibiras2.php';

Kibiras2::akmenuKiekisVisuoseKibiruose();


$k1 = new Kibiras2;
$k2 = new Kibiras2;
$k3 = new Kibiras2;


$k2->prideti1Akmeni();
$k3->prideti1Akmeni();
$k2->prideti1Akmeni();
$k3->prideti1Akmeni();
$k2->prideti1Akmeni();
$k1->pridetiDaugAkmenu(8);


$k1->kiekPririnktaAkmenu();
$k2->kiekPririnktaAkmenu();
$k3->kiekPririnktaAkmenu();

$k4 = new Kibiras2;

$k4->pridetiDaugAkmenu(7);

Kibiras2::akmenuKiekisVisuoseKibiruose();