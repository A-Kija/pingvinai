<?php
echo '<pre>';
$mas = [];

// foreach (range(1, 3) as $_) {
//     $mas1 = [];
//     foreach (range(1, 3) as $_) {
//         $mas1[] = rand(0, 3);
//     }
//     $mas[] = $mas1;
// }

foreach (range('A', 'C') as $i1) {
    foreach (range('A', 'C') as $i2) {
        $mas[$i1][$i2] = rand(0, 3);
    }
}

// skaitymas
// foreach($mas as $val1) {
//     foreach($val1 as $val2) {
//         echo "<h3>$val2</h3>";
//     }
// }

foreach($mas as &$val1) {
    foreach($val1 as &$val2) {
        $val2 = 10;
    }
}

foreach($mas as $i1 => $val1) {
    foreach($val1 as $i2 => $val2) {
        $mas[$i1][$i2] = 25;
    }
}


$masA = ['A', 'Z', 'U', 'B'];
$masB = ['C', 'X', 'C', 'Z'];


print_r(array_intersect($masA, $masB));

print_r(array_diff($masA, $masB));
print_r(array_diff($masB, $masA));


print_r(array_flip(array_flip($masB)));

