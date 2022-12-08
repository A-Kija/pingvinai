<?php

$movie = 'Star Wars: Episode '.str_repeat(' ', rand(0,5)). rand(1,9) . ' - A New Hope';

preg_match('/(.*)(\d)(.*)/', $movie, $m);

echo '<pre>';

print_r($m);
echo '<br>';
echo $movie;