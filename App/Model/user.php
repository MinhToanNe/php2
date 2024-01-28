<?php

namespace App\Models;
require_once "./App/Core/database.php";
use Core\database;
class user extends database
{
    public function LoGin($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        $result = $this->pdo_query_one($sql, $username, $password);
        
    }
}
