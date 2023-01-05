<?php 
namespace Front\Controllers;
use Front\App;
use Front\DB\FileReader as FR;

class GrybasApi {

    public function index()
    {
        $grybai = (new FR('grybai'))->showAll();
        
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        return json_encode(['grybai' => array_values($grybai)]);
    }


    public function save()
    {
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        $rawData = file_get_contents("php://input");
        (new FR('grybai'))->create(json_decode($rawData, 1));
        return 'SAVE OK';
    }

    public function edit($id)
    {
        $pageTitle = 'Grybai | Redaguoti';
        $grybas = (new FR('grybai'))->show($id);
        return App::view('grybas-edit', compact('pageTitle', 'grybas'));
    }

    public function update($id)
    {
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: PUT');
        $rawData = file_get_contents("php://input");
        (new FR('grybai'))->update($id, json_decode($rawData, 1));
        return 'EDIT OK';
    }

    public function delete($id)
    {
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: DELETE');
        (new FR('grybai'))->delete($id);
        return 'DELETE OK';
    }

}