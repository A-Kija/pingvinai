<?php

$data = [
    ['id' => rand(1000000, 10000000), 'name' => 'Bebras', 'color' => 'brown', 'trees' => 10],
    ['id' => rand(1000000, 10000000), 'name' => 'Briedis', 'color' => 'crimson', 'trees' => 10],
    ['id' => rand(1000000, 10000000), 'name' => 'Zebras', 'color' => 'white', 'trees' => 10],
    ['id' => rand(1000000, 10000000), 'name' => 'Meškėnas', 'color' => 'skyblue', 'trees' => 10],
    ['id' => rand(1000000, 10000000), 'name' => 'Žiogas', 'color' => 'green', 'trees' => 10]
];

file_put_contents(__DIR__ . '/data', serialize($data));