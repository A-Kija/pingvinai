<?php

abstract class Duobe {

    // public function ispilti() :void 
    // {
    //     $this->akmenuKiekis = 0;
    // }

    public function arGili() : bool
    {
        return true;
    }

    abstract public function ispilti(array $b) :bool;
    

}