<?php
use App\Core\Database;
class UserModel extends Database
{
    public function Login($username)
    {
        $sql = "SELECT * FROM users WHERE `user_name` = ?";
        return $this->pdo_query($sql,$username);

    }
}