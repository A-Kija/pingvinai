<?php

class Cart {

    private $id;
    private static $cart;


    public static function getCart() : self
    {
        return  self::$cart ?? self::$cart = new self;
    }
    
    
    private function __construct()
    {
        $this->id = rand(0, 1000000);
    }

    public function __get($prop)
    {
        return $this->$prop;
    }

}