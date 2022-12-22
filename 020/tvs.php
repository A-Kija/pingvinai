<?php


require __DIR__ . '/TV.php';

$tv1 = new TV('samsung', 'Petras');
$tv2 = new TV('samsung', 'Ona');
$tv3 = new TV('samsung', 'Bebras');


$tv1->watch(1);
$tv2->watch(3);
$tv3->watch(2);


TV::$channelList = [1 => 'TV3', 2 =>'TV Polonia', 3 => 'LRT', 4 =>'BTV'];



$tv1->watch(2);
$tv2->watch(2);
$tv3->watch(2);