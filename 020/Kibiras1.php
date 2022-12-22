<?php

class Kibiras1 extends Duobe {

    protected $akmenuKiekis;
    protected $color;

    public function __construct($kiekis, $color)
    {
        $this->akmenuKiekis = $kiekis;
        $this->color = $color;
    }

    public function prideti1Akmeni() : void
    {
        $this->akmenuKiekis++;
    }

    public function pridetiDaugAkmenu(int $kiekis) : void
    {
        $this->akmenuKiekis =+ $kiekis;
    }

    public function kiekPririnktaAkmenu() : void
    {
        echo '<h1 style="color: '.$this->color.';">Pririnkta: '.$this->akmenuKiekis.'</h1>';
    }

    public function ispilti(array $x) :bool
    {
        $this->akmenuKiekis = 0;

        return true;
    }

}


