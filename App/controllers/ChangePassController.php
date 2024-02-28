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
        if (isset($_GET['token'])) {
            $validate = [];
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $new_pass = $_POST['password'];
                $password = password_hash($new_pass, PASSWORD_DEFAULT);
                $token = $_GET['token'];
                if (empty($new_pass)) {
                    $validate +=
                        [
                            "validatePass" => "Mật khẩu không được trống"
                        ];
                }
                if (empty($validate)) {
                    $change = $this->userModel->ChangePassword($password, $token);
                    if ($change) {
                        $this->userModel->DeleteToken($password);
                        header("Location: /login");
                    }
                }
            }
        }

        $this->load->render('pages/ChangePasswordForm', [
            "validate" => $validate
        ]);
    }
}
