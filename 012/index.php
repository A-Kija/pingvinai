<?php

// $movie = 'Star Wars: Episode '.str_repeat(' ', rand(0,5)). rand(1,9) . ' - A New Hope';

// preg_match('/(.*)(\d)(.*)/', $movie, $m);



// @$c++;



echo '<pre>';


// print_r($m);
// echo '<br>';
// echo $movie;

$arr = ['Bebras', 'Zebras', 'Avinas', [1, 'Jo' => 2, 3]];

define('BEBRAS', 'Bebrai jėga!');

// @define('BEBRAS', '444444444444444');


define('KITA', [1, 2, 3]);


echo '<br>';
print_r(KITA[0]);

echo '<br>';

echo BEBRAS;



echo '<br>';

echo __DIR__;
echo '<br>';
print_r($arr);



$j = json_encode($arr);
$s = serialize($arr);

file_put_contents(__DIR__ . '/labas.json', $j);
file_put_contents(__DIR__ . '/labas2.txt', $s);


$jf = file_get_contents(__DIR__ . '/labas.json');
$sf = file_get_contents(__DIR__ . '/labas2.txt');

$backArr = json_decode($jf, 1);
$backArr2 = unserialize($sf);

print_r($backArr);
print_r($backArr2);