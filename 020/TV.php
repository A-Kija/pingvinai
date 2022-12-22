<?php


class TV {

    public $maker;
    public $owner;
    public static $channelList = [1 => 'TV3', 2 =>'LNK', 3 => 'LRT', 4 =>'BTV'];
    private $watchNow;


    public function __construct($maker, $owner)
    {
        $this->maker = $maker;
        $this->owner = $owner;
    }


    public function watch($number)
    {
        $this->watchNow = $number;
        echo '<h1>'.$this->owner.' --> '. self::$channelList[$this->watchNow].'</h1>';
    }


}