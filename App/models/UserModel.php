<?php

use App\models\BaseModel;

class UserModel extends BaseModel
{
    function __construct()
    {
        parent::__construct();
    }
    public function Login($user_name)
    {
        return $this->GetOne('users', 'user_name', $user_name);
    }

    public function GetOneById($user_id)
    {
       
        return $this->GetOne('users', 'id', $user_id);
    }


    public function ResetPassword($token,$email)
    {
        $sql = "UPDATE users SET reset_id = ?
                WHERE Email = ?";
                $this->db->pdo_execute($sql,$token,$email);

    }

    public function GetOneByEmail($Email)
    {
       
        return $this->GetOne('users', 'Email', $Email);
    }

    public function ChangePassword($password,$token)
    {
        $sql = "UPDATE users SET password = ?
                WHERE reset_id = ?";
              return $this->db->pdo_execute($sql,$password,$token);

    }

    public function DeleteToken($password)
    {
        $sql = "UPDATE users SET reset_id = NULL
                WHERE password = ?";
                $this->db->pdo_execute($sql,$password);

    }
}
