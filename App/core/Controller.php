<?php
class Controller
{
    // Hàm gọi  folder models
    public function model($model)
    {
        require_once './App/model/' . $model . '.php';
        return new $model;
    }
    // Hàm gọi  folder views
    public function view($view, $data = array())
    {
        require_once './App/view/' . $view . '.php';
    }
}