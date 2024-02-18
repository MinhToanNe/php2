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
    public function CreateBlog($category, $user_id, $title, $content, $image)
    {
        $sql = "INSERT INTO blogs(category_id, user_id, title, content, image) 
                VALUES (?,?,?,?,?)";
                return $this->db->pdo_execute($sql, $category, $user_id, $title, $content, $image);
    }

    public function GetOneBlogById($id)
    {
        $sql = "SELECT * FROM blogs
                WHERE id = ?";
                return $this->db->pdo_query($sql,$id);      

    }

    public function DeleteBlog($id)
    {
        return $this->Delete('blogs','id',$id);
    }

    public function EditBlog($title,$category,$content,$image,$user_id,$id)
    {
        $sql = "UPDATE blogs SET title = ?, category_id = ?, content = ?, image = ?, user_id = ?
                WHERE id = ?";
                return $this->db->pdo_execute($sql,$title,$category,$content,$image,$user_id,$id);
    }

    public function GetBlogRecent()
    {
        $sql = "SELECT * FROM blogs
                ORDER BY created_at DESC LIMIT 3";
                return $this->db->pdo_query($sql); 
    }

    public function CoutBlog()
    {
        $sql = "SELECT count(*) FROM blogs";
        return $this->db->pdo_query_value($sql);
    }

    public function GetAllBlogLimit($starIndex, $itemPerPage)
    {
        $sql = "SELECT * FROM blogs
                LIMIT $starIndex, $itemPerPage ";
                return $this->db->pdo_query($sql,$starIndex, $itemPerPage); 
    }

    public function GetBlogByCategory($category)
    {
        $sql = "SELECT * FROM blogs
        WHERE category_id = ? ";
        return $this->db->pdo_query($sql,$category); 

    }

    public function SearchBlog($searchKey)
    {
        $sql = "SELECT * FROM blogs
        WHERE title LIKE '%$searchKey%' OR content LIKE '%$searchKey%' ";
        return $this->db->pdo_query($sql,$searchKey); 

    }


}
