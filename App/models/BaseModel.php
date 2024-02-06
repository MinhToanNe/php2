<?php
namespace App\models;
use App\Core\Database;
use App\interfaces\InterfaceModel;

abstract class BaseModel  implements InterfaceModel
{
    protected  $db;
    
    public function __construct()
    {
        $this->db = new Database;
    }
    public function GetOne($table,$col,$value)
    {
        $sql = "SELECT * FROM $table WHERE $col = ?";
        return  $this->db->pdo_query($sql,$value);


    }
    public function Create()
    {

    }
    public function Delete()
    {

    }
}