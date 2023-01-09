<?php 
namespace Front\Controllers;
use Front\App;
use Front\DB\FileReader as FR;
use Front\Message as M;

class Grybas {

    public function index()
    {
        $grybai = (new FR('grybai'))->showAll();
        $pageTitle = 'Grybai | Sąrašas';
        $message = M::get();
        return App::view('grybas-list', compact('grybai', 'pageTitle', 'message'));
    }

    public function create()
    {
        $pageTitle = 'Grybai | Naujas';
        $message = M::get();
        return App::view('grybas-create', compact('pageTitle', 'message'));
    }

    public function save()
    {
        (new FR('grybai'))->create($_POST);
        M::add('Grybas vietoj', 'ok');
        return App::redirect('grybai');
    }

    public function edit($id)
    {
        $pageTitle = 'Grybai | Redaguoti';
        $grybas = (new FR('grybai'))->show($id);
        $message = M::get();
        return App::view('grybas-edit', compact('pageTitle', 'grybas', 'message'));
    }

    public function update($id)
    {
        (new FR('grybai'))->update($id, $_POST);
        M::add('Grybas paredaguotas', 'ok');
        return App::redirect('grybai');
    }

    public function delete($id)
    {
        (new FR('grybai'))->delete($id);
        M::add('Grybas nupjautas', 'error');
        return App::redirect('grybai');
    }

}