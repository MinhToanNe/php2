<?php
class Controller
{
    // Hàm gọi  folder models
    public function model($model)
    {
        require_once './mvc/model/' . $model . '.php';
        return new $model;
    }
    // Hàm gọi  folder views
    public function view($view, $data = array())
    {
        require_once './mvc/view/' . $view . '.php';
    }
}