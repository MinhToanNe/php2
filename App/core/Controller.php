<?php
namespace App\Core;
class Controller
{
   
    public function view($view, $data = array())
    {
        require_once './App/views/' . $view . '.php';
    }
}