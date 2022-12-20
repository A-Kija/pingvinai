<?php
// Petras
class Bebras {

    public $color = 'Brown';
    private $age = 32;
    private $isLive = true;


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