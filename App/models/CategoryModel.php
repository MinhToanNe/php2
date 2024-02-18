<?php


use App\models\BaseModel;

class CategoryModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }
    public function GetAllCategory()
    {
        return $this->GetAll('categorys');
    
    }

    public function CreateCategory($name)
    {
        $sql = "INSERT INTO categorys(name) VALUES (?)";
       return $this->db->pdo_execute($sql,$name);
    }

    public function DeleteCategory($id)
    {
        return $this->Delete('categorys','id',$id);
    }

    public function GetOneById()
    {
        $id = $_GET['id'];
        $sql = "SELECT * FROM categorys WHERE id = ?";
        return $this->db->pdo_query($sql,$id);

    }

    public function edit($name)
    {
        $id = $_GET['id'];
        $sql = "UPDATE categorys SET name = ? WHERE id=?";
        return $this->db->pdo_execute($sql,$name,$id);
    }

}
