<?php


use App\controllers\BaseController;


class Logoutcontroller extends BaseController
{
  

    public function index()
    {
        unset($_SESSION['admin_id']);
        header("Location: /login");
        
    }


}
