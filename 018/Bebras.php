<?php
// Petras
class Bebras {

    public $color;
    private $age;
    private $isLive = true;


    private function __construct($c)
    {
        echo '<h1 style="color:'.$c.';">SUKURTA</h1>';
        $this->age = rand(1, 18);
        $this->color = $c;
    }

    public function age() : string
    {
        return $this->age;
    }

    public function setAge(int $newAge) : void
    {
        if ($newAge > 40) {
            $this->isLive = false;
        }
        $this->age = $newAge;
    }

    public function color() : string
    {
        return $this->isLive ? $this->color : 'Black';
    }

    public function isHeAlive() : bool
    {
        return $this->isLive;
    }

}