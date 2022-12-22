<?php

class Briedis extends Zveris {

    public $color = 'brown';
    public $age = 14;
    public $isLive = true;
    public $browse = 'TIK TOK';
   

    
    public function __construct()
    {
        parent::__construct();
        echo '<h1>Briedžio konstruktorius</h1>';
    }
    
    
    public function __get($prop)
    {
        
        if($prop == 'blabla') {
            return 'Super!';
        }

        if (!in_array($prop, ['color', 'isLive'])) {
            return 'No nO';
        }
        return $this->$prop;
    }

    public function __set($prop, $what)
    {
        $this->$prop = $what;
    }

    public function __toString()
    {
        return '<h2>Čia yra Briedis</h2>';
    }


    public function __invoke($what)
    {
        return "<h2>Čia yra Briedis $what </h2>";
    }


}
