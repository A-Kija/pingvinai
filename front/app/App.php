<?php
namespace Front;

use Front\Controllers\Calculator;
use Front\Controllers\Grybas;
use Front\Controllers\GrybasApi;
use Front\Controllers\Api;

class App {

    public static function start()
    {
        $url = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($url);
        return self::router($url);
    }

    public function cors() {
    
        // Allow from any origin
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
            // you want to allow, and if so:
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400');    // cache for 1 day
        }
        
        // Access-Control headers are received during OPTIONS requests
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
                // may also be using PUT, PATCH, HEAD etc
                header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
            
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
                header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
        
            exit(0);
        }
        
        echo "You have CORS!";
    }

    private static function router(array $url)
    {
        $method = $_SERVER['REQUEST_METHOD'];
       

        if ($method == 'OPTIONS') {
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: OPTIONS, GET, POST, DELETE, PUT');
            header("Access-Control-Allow-Headers: Authorization, Content-Type, X-Requested-With");
            header('Content-Type: application/json');
            return null;
        }
        
        if ($url[0] == 'calculator' && in_array($url[1], ['sum', 'diff', 'mult', 'div']) && count($url) == 4) {
            return (new Calculator)->{$url[1]}($url[2], $url[3]);
        }

        if ($url[0] == 'grybai' && count($url) == 1 && $method == 'GET') {
            return (new Grybas)->index();
        }

        if ($url[0] == 'grybai' && $url[1] == 'create' && count($url) == 2 && $method == 'GET') {
            return (new Grybas)->create();
        }

        if ($url[0] == 'grybai' && $url[1] == 'save' && count($url) == 2 && $method == 'POST') {
            return (new Grybas)->save();
        }

        if ($url[0] == 'grybai' && $url[1] == 'edit' && count($url) == 3 && $method == 'GET') {
            return (new Grybas)->edit($url[2]);
        }

        if ($url[0] == 'grybai' && $url[1] == 'update' && count($url) == 3 && $method == 'POST') {
            return (new Grybas)->update($url[2]);
        }

        if ($url[0] == 'grybai' && $url[1] == 'delete' && count($url) == 3 && $method == 'POST') {
            return (new Grybas)->delete($url[2]);
        }

        if ($url[0] == 'users' && $url[1] == 'all' && count($url) == 2 && $method == 'GET') {
            return (new Api)->allUsers();
        }

        if ($url[0] == 'users' && $url[1] == 'js' && count($url) == 2 && $method == 'GET') {
            return (new Api)->jsUsers();
        }

        // GRYBAI API

        if ($url[0] == 'api' && $url[1] == 'grybai' && count($url) == 2 && $method == 'GET') {
            return (new GrybasApi)->index();
        }

        if ($url[0] == 'api' && $url[1] == 'grybai' && $url[2] == 'save' && count($url) == 3 && $method == 'POST') {
            return (new GrybasApi)->save();
        }

        if ($url[0] == 'grybai' && $url[1] == 'edit' && count($url) == 3 && $method == 'GET') {
            return (new Grybas)->edit($url[2]);
        }

        if ($url[0] == 'grybai' && $url[1] == 'update' && count($url) == 3 && $method == 'POST') {
            return (new Grybas)->update($url[2]);
        }

        if ($url[0] == 'grybai' && $url[1] == 'delete' && count($url) == 3 && $method == 'POST') {
            return (new Grybas)->delete($url[2]);
        }







        return '404 NOT FOUND';
    }

    public static function view(string $__name, array $data)
    {
        ob_start();

        extract($data);

        require __DIR__ .'/../view/top.php';

        require __DIR__ .'/../view/'.$__name.'.php';

        require __DIR__ .'/../view/bottom.php';


        $out = ob_get_contents();
        ob_end_clean();

        return $out;
    }

    public static function redirect($url)
    {
        header('Location: ' . URL . $url);
        return null;
    }




}