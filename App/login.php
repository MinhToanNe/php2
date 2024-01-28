<?php

namespace app;
require "./App/Model/user.php";
use App\Models\user;
class login
{
    public function login()
    {
        if (isset($_SESSION['user'])) {
            $user_name = $_SESSION['user']['username'];
            return "{$user_name} <a hrel='/logout'>Logout</a>";
        } else {
            return '<form action="/login" method="post">
            <label for="username">Tên người dùng:</label>
            <input type="text" id="username" name="username" required>
    
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required>
    
            <button type="submit">Đăng nhập</button>
        </form>';
        }

        if($_SERVER['REQUEST_METHOD']=='POSTS')
        {
            $user_name = $_POST['username'];
            $pass_word = $_POST['Password'];
            $usermodel = new user();
            $checkLogin = $usermodel->LoGin($user_name,$pass_word);
            if(!empty($checkLogin))
            {
                $_SESSION['user']['username'] = $checkLogin["user_name"];
            }

        }
    }
}
