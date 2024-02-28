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
        $validate = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user_name = $_POST['username'];
            $raw_password =   $_POST["password"];
            $row = $this->users->Login($user_name);
            if (empty($user_name)) {
                $validate +=
                    [
                        "validateUsername" => "Tên đăng nhập không được trống"
                    ];
            } else if (empty($row)) {
                $validate +=
                    [
                        "validateUsername" => "Tài khoản không tồn tại"
                    ];
            }
            if (empty($raw_password)) {
                $validate +=
                    [
                        "validatePass" => "Mật khẩu không được trống"
                    ];
            }
            if (empty($validate)) {
                $hash_password = $row[0]["password"];
                if (password_verify($raw_password, $hash_password) &&  $row[0]['role_id'] == 0) {

                    $_SESSION['admin_id'] = $row[0]['id'];
                    header("Location: /admin");
                } else {
                    $validate +=
                        [
                            "validatePass" => "Mật khẩu không chính xác"
                        ];
                }
            }
        }


        $this->load->render('pages/loginAdminForm', [
            "validate" => $validate
        ]);
    }
}
