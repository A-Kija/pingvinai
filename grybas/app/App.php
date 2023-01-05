<?php
namespace Front;


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
       

        


        if ($url[0] == '' && count($url) == 1 && $method == 'GET') {
            return (new Grybas)->index();
        }

        if ($url[0] == 'create' && count($url) == 1 && $method == 'GET') {
            return (new Grybas)->create();
        }

        if ($url[0] == 'save' && count($url) == 1 && $method == 'POST') {
            return (new Grybas)->save();
        }

        if ($url[0] == 'edit' && count($url) == 2 && $method == 'GET') {
            return (new Grybas)->edit($url[1]);
        }

        if ($url[0] == 'update' && count($url) == 2 && $method == 'POST') {
            return (new Grybas)->update($url[1]);
        }

        if ($url[0] == 'delete' && count($url) == 2 && $method == 'POST') {
            return (new Grybas)->delete($url[1]);
        }



     
        return '404 GRYBAS NOT FOUND';
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