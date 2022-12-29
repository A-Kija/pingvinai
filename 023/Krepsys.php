<?php

class Krepsys {

    const DYDIS = 500;
    private $pririnkta = 0;

    public function grybauti(Grybas $grybas) : bool
    {
        if ($grybas->valgomas && !$grybas->sukirmijes) {
            $this->pririnkta += $grybas->svoris;
        }
        return self::DYDIS >= $this->pririnkta;
    }
}