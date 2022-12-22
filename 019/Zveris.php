<?php

class Zveris extends Miskas{

    public $tail = 'Big One';
    public $browse = 'FB';
    protected $has = '1000000$';

    public function __construct()
    {
        parent::__construct();
        echo '<h1>Žverio konstruktorius</h1>';
    }

}