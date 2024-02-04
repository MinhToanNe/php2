<?php

use App\controllers\BaseController;



class LoginController extends BaseController
{

    private $users;
    function __construct()
    {
        parent::__construct();
        $this->users = $this->load->renderModels("UserModel");
    }
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user_name = $_POST['username'];
            $raw_password =   $_POST["password"];
            $row = $this->users->Login($user_name);
            if (!empty($row)) {
                $hash_password = $row[0]["password"];
                if (password_verify($raw_password, $hash_password) &&  $row[0]['role_id']==0) 
                {
                   
                    $_SESSION['admin_id'] = $row[0]['id'];
                    header("Location: /admin");
                } 

                else
                {
                    echo "Đăng nhập thất bại";
                }
            }
            else
            {
                header("Location: /");
            }
        }
      

        $this->load->render('pages/loginAdminForm');
    }
}
