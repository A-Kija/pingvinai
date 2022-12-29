<?php 
namespace Front\Controllers;
use Front\App;

class Calculator {

    public function sum($a, $b)
    {
        $result = $a + $b;
        $pageTitle = 'Calculator | SUM';

        // return App::view('calculator', ['result' => $result]);
        return App::view('calculator', compact('result', 'pageTitle'));
    }

    public function diff($a, $b)
    {
        $result = $a - $b;
        $pageTitle = 'Calculator | DIFF';
        return App::view('calculator', compact('result', 'pageTitle'));
    }

    public function mult($a, $b)
    {
        $result = $a * $b;
        $pageTitle = 'Calculator | MULT';
        return App::view('calculator', compact('result', 'pageTitle'));
    }

    public function div($a, $b)
    {
        $result = $a / $b;
        $pageTitle = 'Calculator | DIV';
        return App::view('calculator_div', compact('result', 'pageTitle'));
    }

}

