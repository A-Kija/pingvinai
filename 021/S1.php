<?php 

class S1 {

    public static $a = 'S1';


    public static function printA()
    {
        echo '<h3>' . self::$a . '<h3>';
        echo '<h3>' . static::$a . '<h3>';
    }

}