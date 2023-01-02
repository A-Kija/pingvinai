<?php
use Front\App;

define('URL', 'http://front.lt/');

require __DIR__ . '/../vendor/autoload.php';


$response = App::start();

echo $response;