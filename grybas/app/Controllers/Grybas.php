<?php 
namespace Front\Controllers;
use Front\App;


class Grybas {

    public function index()
    {
        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'http://front.lt/api/grybai');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $grybai = json_decode(curl_exec($ch), 1)['grybai'];

        curl_close($ch);

        $pageTitle = 'Grybai | Sąrašas';
        return App::view('grybas-list', compact('grybai', 'pageTitle'));
    }

    public function create()
    {
        $pageTitle = 'Grybai | Naujas';
        return App::view('grybas-create', compact('pageTitle'));
    }

    public function save()
    {
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://front.lt/api/grybai/save');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST));
        $res = curl_exec($ch);
        curl_close($ch);

        return App::redirect('');
    }

    public function edit($id)
    {
        $pageTitle = 'Grybai | Redaguoti';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://front.lt/api/grybai');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $grybai = json_decode(curl_exec($ch), 1)['grybai'];
        foreach ($grybai as $grybas) {
            if ($id == $grybas['id']) {
                break;
            }
        }
        curl_close($ch);
        return App::view('grybas-edit', compact('pageTitle', 'grybas'));
    }

    public function update($id)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://front.lt/api/grybai/update/'. $id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST));
        $res = curl_exec($ch);
        curl_close($ch);
        return App::redirect('');
    }

    public function delete($id)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://front.lt/api/grybai/delete/'. $id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST));
        $res = curl_exec($ch);
        curl_close($ch);
       
        return App::redirect('');
    }

}