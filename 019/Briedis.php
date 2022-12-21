<?php

class Briedis {

    private $color = 'brown';
    private $age = 14;
    private $isLive = true;

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
