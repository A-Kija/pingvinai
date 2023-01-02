<?php
namespace Front;

use Front\Controllers\Calculator;
use Front\Controllers\Grybas;

class App {

    public static function start()
    {
        $url = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($url);
        return self::router($url);
        
    }

    private static function router(array $url)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        
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