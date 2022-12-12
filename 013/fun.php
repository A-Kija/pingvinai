<?php

function sudeti($x, ...$a) : int
{
    
    // $vienas = $vienas + $vienas;
    
    $rezultatas = $x + $a[0] + $a[1];
    return $rezultatas;
}



$vienas = 1;
$penki = 5;


  
// echo sudeti($vienas, $penki, 88);
echo '<pre><br>';
// echo $vienas;
// echo '<br>';

function foo($reset = false) {
    static $index = 0;
    if ($reset) {
        $index = 0;
    } else {
    $index++;
    echo "$index\n";
    }

}

// foo();
// foo();
// foo();
// foo(true);
// foo();
// foo();
// foo();

// echo '<br><br><br>';

function recursive($num){
    echo $num, '<br>';
    if ($num < 3){
        recursive($num + 1);
    }
    echo $num, '<br>';
    return;
}
$startNum = 1;
// recursive($startNum);

$mas = [
    1,
    1,
    [
        1,
        1,
        1,
        [
            1
        ],
        [
            1, 
            [
                1,
                1
            ]
        ]
    ],
    1,
    1,
    [
        1
    ]
];

// print_r($mas);

function sum(array $a) : int
{
    $s = 0;
    foreach($a as $val) {
        if (is_array($val)) {
            $s += sum($val);
        } else {
            $s += $val;
        }
    }
    // echo "<h2>$s</h2>";
    return $s;
}

echo '<br>';
echo sum($mas);



$an = function() {
    echo '<h2>anonimas</h2>';
};

function darViena(closure $cb) : void
{
    echo '<h2>vidus</h2>';
    $cb();
}

darViena($an);

darViena(function() {
    echo '<h2>anonimas2</h2>';
});

$masyvas = [
    ['a','d'],
    ['v','y'],
    ['z','c'],
    ['s','r'],
];

function sortiravimas($a, $b){
    return $a[1] <=> $b[1];
};

usort($masyvas, 'sortiravimas');

// print_r($masyvas);


$isorinis = 'black';

$bebras = function() use ($isorinis) : void {
    echo "<h2>anonimas $isorinis</h2>";
};


$bebras();