<?php 
namespace Front\Controllers;
use Front\App;

class Api {


    public function allUsers()
    {
        $pageTitle = 'Users | ALL';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://jsonplaceholder.typicode.com/users');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $users= json_decode(curl_exec($ch));

        curl_close($ch);

        return App::view('users-list', compact('users', 'pageTitle'));
    }


    public function jsUsers()
    {
        $pageTitle = 'Users | JS';

       return App::view('users-js-list', compact('pageTitle'));
    }


}