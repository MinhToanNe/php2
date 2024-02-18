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

    public function GetAll($table)
    {
        $sql = "SELECT  * FROM $table ";
        return $this->db->pdo_query($sql);
    }
    public function Create()
    {

    }
    public function Delete($table, $col, $value)
    {
        $sql = "DELETE FROM $table WHERE $col=?";
        return $this->db->pdo_execute($sql,$value);

    }
}