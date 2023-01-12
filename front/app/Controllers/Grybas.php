<?php 
namespace Front\Controllers;
use Front\App;
use Front\DB\FileReader as FR;
use Front\DB\SqlReader as SQL;
use Front\Message as M;


class Grybas {

    private $setting = 'sql'; // sql arba file

    private function storage($name)
    {
        if ($this->setting == 'file') {
             return new FR('grybai');
        }
        if ($this->setting == 'sql') {
            return new SQL('grybai');
       }
    }

    
    public function index()
    {
        $grybai = $this->storage('grybai')->showAll();
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
        $this->storage('grybai')->create($_POST);
        M::add('Grybas vietoj', 'ok');
        return App::redirect('grybai');
    }

    public function edit($id)
    {
        $pageTitle = 'Grybai | Redaguoti';
        $grybas = $this->storage('grybai')->show($id);
        $message = M::get();
        return App::view('grybas-edit', compact('pageTitle', 'grybas', 'message'));
    }

    public function update($id)
    {
        $this->storage('grybai')->update($id, $_POST);
        M::add('Grybas paredaguotas', 'ok');
        return App::redirect('grybai');
    }

    public function delete($id)
    {
        $this->storage('grybai')->delete($id);
        M::add('Grybas nupjautas', 'error');
        return App::redirect('grybai');
    }

}