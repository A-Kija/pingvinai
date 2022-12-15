<?php

function h1(string $text) : string
{
    return '<h1 style="display: inline; color: crimson;">'.$text.'</h1>';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= preg_replace_callback('/(\d{2})(\d+)/', function($d) {
    return h1($d[1]).$d[2];
    }, md5(time())) ?>
    <br>
    <?= md5(md5('123')) ?>
    <?= sha1('123') ?>
    <br>
    <?= md5('ačiū') ?>
    <?= sha1('124') ?>
</body>
</html>