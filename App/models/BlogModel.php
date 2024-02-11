<?php

use App\models\BaseModel;

class BlogModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }
    public function GetAllBlog()
    {
        $sql = "SELECT b.*, u.user_name, c.name
                FROM blogs b
                INNER JOIN users u on b.user_id = u.id
                INNER JOIN categorys c on b.category_id = c.id ";
        return $this->db->pdo_query($sql);
    }
    // public function Add()
    // {
    //  $sql = "INSERT INTO blogs(category_id, user_id, title, content, image, created_at) 
    //          VALUES ()"
    // }
}
