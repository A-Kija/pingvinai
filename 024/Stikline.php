<?php

class Stikline {

    private $turis, $kiekis;

    public function __construct(int $turis)
    {
        $this->turis = $turis;
        $this->kiekis = 0;
    }

    public function ipilti(int $kiekis) : self
    {
        $this->kiekis = min($this->turis, $this->kiekis + $kiekis);
        return $this;
    }


    public function ispilti() : int
    {
        $kiekis = $this->kiekis;
        $this->kiekis = 0;
        return $kiekis;
    }

}