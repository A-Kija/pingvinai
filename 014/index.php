<?php

echo '<pre>';
$mas = [];
$rez = [];

foreach(range(1, 10) as $_) {
    $small = [];
    foreach(range(1, 5) as $_) {
        $small[] = rand(5, 25);
    }
    $mas[] = $small;
}

$rez['a'] = 0;

foreach($mas as $small) {
    foreach($small as $val) {
        $rez['a'] += $val > 10 ? 1 : 0;
    }
}

$rez['b'] = $mas[0][0];

foreach($mas as $small) {
    foreach($small as $val) {
        $rez['b'] = max($rez['b'], $val);
    }
}

$rez['c'] = [];

foreach($mas as $small) {
    foreach($small as $index => $val) {
        $rez['c'][$index] = ($rez['c'][$index] ?? 0) + $val;
    }
}

foreach($mas as &$small) {
    foreach(range(1, 2) as $_) {
        $small[] = rand(5, 25);
    }
}

$rez['d'] = array_map(fn($v) => array_sum($v), $mas);


print_r($mas);
print_r($rez);