<?php

$users = [
    ['name' => 'Bebras', 'psw' => md5('123'), 'color' => 'crimson'],
    ['name' => 'Briedis', 'psw' => md5('123'), 'color' => 'skyblue'],
    ['name' => 'Paršas', 'psw' => md5('123'), 'color' => 'pink']
];

file_put_contents(__DIR__ . '/users', serialize($users));