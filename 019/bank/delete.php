<?php

$users = unserialize(file_get_contents(__DIR__ . '/data'));

$id = (int) $_GET['id'];


foreach($users as $index => $user) {
    if ($user['id'] == $id) {
        unset($users[$index]);
        break;
    }
}

file_put_contents(__DIR__ . '/data', serialize($users));

header('Location: http://localhost/pingvinai/019/bank/');