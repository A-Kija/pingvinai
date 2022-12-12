<?php

echo '<pre>';
$rez = [];

$mas = array_map(fn() => rand(5, 25), range(1, 30));



$rez['a'] = 0;
foreach ($mas as $val) {
    if($val > 10) {
        $rez['a']++;
    }
}

$rez['b value'] = $mas[0];
$rez['b index'] = [0];

foreach ($mas as $index => $val) {
    if ($val > $rez['b value']) {
        $rez['b value'] = $val;
        $rez['b index'] = [];
        // $rez['b index'][] = $index;
    } 
    if ($val == $rez['b value']) {
        $rez['b index'][] = $index;
    }
}

$rez['c'] = 0;
foreach ($mas as $val) {
    if ($val % 2 != 0) {
        $rez['c'] += $val;
    }
}

$rez['d'] = array_map(fn($a, $b) => $a - $b, $mas, array_keys($mas));

foreach(range(1, 10) as $_) {
    $mas[] = rand(5, 25);
}

foreach($mas as $index => $val) {
    $rez['f'][$index % 2][] = $val;
}

foreach ($mas as &$val) {
    $val = $val > 15 ? 0 : $val;
}


foreach ($mas as $index => $val) {
    if ($val > 10) {
        $rez['h'] = $index;
        break;
    }
}

foreach ($mas as $index => &$val) {
    if ($index % 2 == 0) {
        unset($mas[$index]);
    }
}

$mas = array_values($mas);

print_r($rez);
print_r($mas);