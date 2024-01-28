<?php
namespace app;
class home
{
    public function index():string
    {
       return<<<FORM
       <form action="/upload" method="post" enctype="multipart/form-data">
       <input type="file" name="image"/>
       <button type="submit">Upload</button>
       </form>
       FORM;

    }
    
    public function upload()
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $old_name = $_FILES['image']['name'];
            $upload_dir = "public/uploads/";
            $extension = pathinfo($old_name, PATHINFO_EXTENSION);
            $new_name = date('YmdHis').'.'. $extension;
            $tmp_name = $_FILES['image']['tmp_name'];
            if(move_uploaded_file($tmp_name,$upload_dir . $new_name))
            {
                echo "Thêm ảnh thành công";
            };
        }
    }
}

