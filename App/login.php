<?php

namespace app;

require "./App/Model/user.php";

use App\Models\user;

class login
{
    public $name_error = "";

    public function login()
    {
        if (isset($_SESSION['user'])) {
            $user_name = $_SESSION['user'];
            return "{$user_name} <br>
            <button><a href='/logout'>Logout</a></button>";
        } else {
            if (isset($_POST['username'])) {
                $user_name = $_POST['username'];
                $pass_word = $_POST['password'];
                $usermodel = new user();
                $name_pattern = "/^[a-zA-Z]{4,}+$/";
                $pass_pattern = "/^[a-zA-Z1-9]{8,}+$/";
                if (empty($user_name)) {
                    $name_error = "Tên không dược trống";
                } else if (!preg_match($name_pattern, $user_name)) {
                    $name_error = "Tên không đúng định dạng";
                }
                if (empty($pass_word)) {
                    $password_error = "Mật khẩu không dược trống";
                } else if (!preg_match($pass_pattern, $pass_word)) {
                    $password_error = "Mật khẩu không đúng định dạng";
                }
                if (!isset($name_error) && !isset($password_error))
                 {
                    $checkLogin = $usermodel->Login($user_name, $pass_word);
                    if (!empty($checkLogin)) 
                    {
                        $_SESSION['user'] = $checkLogin["user_name"];
                        header("Location: /login");
                    }
                }
            }

            require "./App/Views/LoginForm.php";
        }
    }
    public function logout()
    {
        session_unset();
        header("Location: /");
    }

    public function ForgetForm()
    {
        require "./App/Views/ForgotPasswordForm.php";
    }
}
