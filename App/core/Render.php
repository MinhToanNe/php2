<?php
namespace App\Core;
class render
{
   
    public function render($view, $data = array())
    {
        require_once './App/views/' . $view . '.php';
    }

    public function renderModels($file)
    {
        require_once './App/models/' . $file . '.php';
        return new $file;
    }
}