<?php
use Front\App;

define('URL', 'http://grybas.lt/');

require __DIR__ . '/../vendor/autoload.php';


$response = App::start();

echo $response;