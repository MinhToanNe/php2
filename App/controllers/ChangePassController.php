<?php

use App\controllers\BaseController;



class ChangePassController extends BaseController
{
    private $userModel;

    function __construct()
    {
        parent::__construct();
        $this->userModel = $this->load->renderModels("UserModel");
    }
    public function index()
    {
        if (isset($_GET['token']))
        {
            if($_SERVER["REQUEST_METHOD"] == "POST") 
            {
                    $new_pass = $_POST['password'];
                    $password = password_hash($new_pass, PASSWORD_DEFAULT);
                    $token = $_GET['token'];
                    $change = $this->userModel->ChangePassword($password,$token);
                   if($change)
                   {
                    $this->userModel->DeleteToken($password);
                    header("Location: /login");
                   }
                    
            }
        

        }
        
        $this->load->render('pages/ChangePasswordForm');
    }
}
