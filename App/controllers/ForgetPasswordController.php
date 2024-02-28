<?php

use App\controllers\BaseController;



class ForgetPasswordController extends BaseController
{
    private $userModel;

    function __construct()
    {
        parent::__construct();
        $this->userModel = $this->load->renderModels("UserModel");
    }
    public function index()
    {
        $validate = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Email = $_POST['email'];
            $token = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            $row =  $this->userModel->GetOneByEmail($Email);
            $this->userModel->ResetPassword($token, $Email);
            if (empty($Email)) {
                $validate +=
                    [
                        "validateEmail" => "Email không được trống"
                    ];
            } else if (empty($row)) {
                $validate +=
                    [
                        "validateEmail" => "Email không đúng"
                    ];
            }

            if (empty($validate)) {
                $content = "Vui lòng click vào link sau đây để thay đổi mật khẩu <a href='http://php2.toanlmpc05557/ChangePass?token=$token'>Link thay đổi mật khẩu</a>";
                SendMail($Email, $content, 'Change Password');
                header("Location:/SendMailSuccess");
            }
        }
        $this->load->render('pages/ForgetPasswordForm', [
            "validate" => $validate
        ]);
    }
}
