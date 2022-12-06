<?php



$pirmas = 'antras';
$antras = 'kitas';
$kitas = 'Bla bla';
echo $$$pirmas;

$mas = [8, 7, 9, 0, 1];
echo '<br>';
echo '<pre>';


// usort($mas, fn($a, $b) => $a <=> $b);

usort($mas, function($a, $b) {
    if ($a > $b) {
        return 1;
    }
    if ($a < $b) {
        return -1;
    }
    return 0;
});


// print_r($mas);

$vienas = 5;


$rezultatas = 1 == $vienas ? 'Yes' : ( 2 == $vienas ? 'Maybe' : 'No' );

// 3 == $vienas ? f2() : f1();

echo '<br>';

// echo $rezultatas;

echo '<br>';
// var_dump(isset($i)); // gražina FALSE
// $i=1;
// var_dump(isset($i)); // gražina TRUE
// // $i=null; 
// var_dump(isset($i)); //gražina FALSE

// var_dump($i ?? 8);

$i = 2;

if ($i == 0) {
    echo 'i equals 0';
} elseif ($i == 1) {
    echo 'i equals 1';
} elseif ($i == 2) {
    echo 'i equals 2';
} else {
    echo 'i equals any';
}

echo '<br>';echo '<br>';

switch ($i) {
    case 0:
        echo 'i equals 0';
        break;
    case 1:
        echo 'i equals 1';
        break;
    case 2:
        echo 'i equals 2';
        break;
    default: 
        echo 'i equals any';
}

echo '<br>';echo '<br>';

$print = match($i) {
    0 => 'i equals 0',
    1 => 'i equals 1',
    2 => 'i equals 2',
    default => 'i equals any',
};
echo $print;


// S M L XL
// $size = 'S';

// echo 'Turim '.$size;
// echo '<br>';
// if ($size == 'S') {
//     echo '<br> tikrinam S';
// }
// if ($size == 'M' || $size == 'S') {
//     echo '<br> tikrinam M';
// }
// if ($size == 'L' || $size == 'M' || $size == 'S') {
//     echo '<br> tikrinam L';
// }
// if ($size == 'XL' || $size == 'L' || $size == 'M' || $size == 'S') {
//     echo '<br> tikrinam XL';
// }

// switch ($size) {
//     case 'S': echo '<br> tikrinam S';
//     case 'M': echo '<br> tikrinam M';
//     case 'L': echo '<br> tikrinam L';
//     default: echo '<br> tikrinam XL';
// }


$kintamasis1 = rand(0, 4);
$kintamasis2 = rand(0, 4);
echo '<br>';

echo "$kintamasis1 ir $kintamasis2";

echo '<br>';

if (!($kintamasis1 * $kintamasis2)) {
    echo 'Dalyba negalima nes 0';
} elseif ($kintamasis1 > $kintamasis2) {
    echo round($kintamasis1 / $kintamasis2, 2);
} else {
    echo round($kintamasis2 / $kintamasis1, 2);
}

$str = 'AČiŪ';

echo '<br>';

echo strlen($str);

echo '<br>';



echo mb_strlen($str);