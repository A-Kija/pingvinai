<?php
namespace Front;


class Message {

    public static function add($text, $type)
    {
        $_SESSION['message'] = ['text' => $text, 'type' => $type];
    }

    public static function get()
    {
        $message = $_SESSION['message'] ?? null;
        unset($_SESSION['message']);
        return $message;
    }

}