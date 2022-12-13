<?php

$p = file_get_contents(__DIR__ . '/swamp.jpg');

header('Content-type:image/jpeg');

echo $p;





