<?php

class Kibiras2 {

    protected $akmenuKiekis;
    private static $akmenuKiekisVisuoseKibiruose = 0;

    public static function akmenuKiekisVisuoseKibiruose() : void
    {
        // echo $this->akmenuKiekis;
        echo '<h1>Pririnkta visuose kibiruose: '.self::$akmenuKiekisVisuoseKibiruose.'</h1>';
    }

    public function __construct()
    {
        $this->akmenuKiekis = 0;
    }

    public function prideti1Akmeni() : void
    {
        self::$akmenuKiekisVisuoseKibiruose++;
        $this->akmenuKiekis++;
    }

    public function pridetiDaugAkmenu(int $kiekis) : void
    {
        self::$akmenuKiekisVisuoseKibiruose += $kiekis;
        $this->akmenuKiekis += $kiekis;
    }

    public function kiekPririnktaAkmenu() : void
    {
        echo '<h1>Pririnkta: '.$this->akmenuKiekis.'</h1>';
    }


}


