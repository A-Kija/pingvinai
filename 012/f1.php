<?php

echo '<h2>F1</h2>';

require __DIR__ . '/f2.php';

// require_once __DIR__ . '/f2.php';


$data = require __DIR__ . '/f3.php';

echo '<pre><br>';

print_r($data);
