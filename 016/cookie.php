<?php


setcookie(
    'bebras',
    'bebras tai ne zebras',
    time()-3600
);


echo '<pre>';

print_r($_COOKIE);