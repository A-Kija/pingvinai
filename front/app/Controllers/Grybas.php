<?php 
namespace Front\Controllers;
use Front\App;
use Front\DB\FileReader as FR;

class Grybas {

    public function index()
    {
        $grybai = (new FR('grybai'))->showAll();
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
        (new FR('grybai'))->create($_POST);
        return App::redirect('grybai');
    }

    public function edit($id)
    {
        $pageTitle = 'Grybai | Redaguoti';
        $grybas = (new FR('grybai'))->show($id);
        return App::view('grybas-edit', compact('pageTitle', 'grybas'));
    }

    public function update($id)
    {
        (new FR('grybai'))->update($id, $_POST);
        return App::redirect('grybai');
    }

    public function delete($id)
    {
        (new FR('grybai'))->delete($id);
        return App::redirect('grybai');
    }

}