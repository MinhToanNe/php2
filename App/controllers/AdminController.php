<?php

use App\controllers\BaseController;
use App\Core\BaseRender;

class AdminController extends BaseController
{
    private $_renderBase;
    private $UserModel;
    private $BlogModel;
    private $CategoryModel;

    public function __construct()
    {
        checkAdmin();
        parent::__construct();
        $this->_renderBase = new BaseRender();
        $this->UserModel = $this->load->renderModels("UserModel");
        $this->BlogModel = $this->load->renderModels('BlogModel');
        $this->CategoryModel = $this->load->renderModels('CategoryModel');
    }

    public function index()
    {
        $id = $_SESSION['admin_id'];

        $adminName = $this->UserModel->GetOneById($id);
        $BlogList = $this->BlogModel->GetAllBlog();

        $this->_renderBase->renderHeaderAdmin();
        $this->_renderBase->renderNavbarAdmin();

        $this->load->render("blocks/sidebar", [
            "adminName" => $adminName
        ]);

        $this->load->render("pages/homeAdminLayout", [
            "BlogList" => $BlogList
        ]);

        $this->_renderBase->renderFooterAdmin();
    }



    public function add()
    {
        $id = $_SESSION['admin_id'];
        $adminName = $this->UserModel->GetOneById($id);
        $categoryModel = $this->CategoryModel->GetAllCategory();
        $validate = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['title'])) {
                $validate += [
                    'TitleValidate' => "Vui lòng nhập tiêu đề"
                ];
            }

            if (empty($_POST['content'])) {
                $validate += [
                    'ContentValidate' => "Vui lòng nhập nội dung"
                ];
            }
            if (empty($_FILES['image']['name'])) {
                $validate += [
                    'ImageValidate' => "Vui lòng chọn ảnh"
                ];
            }
            $upload = $_FILES['image'];
            if ($upload['error'] === UPLOAD_ERR_OK) {
                $tmp = $upload['tmp_name'];
                $oldName = $upload['name'];
                $newName = uniqid() . '_' . $oldName;
                $uploadDir = 'public/uploads/';
                if (move_uploaded_file($tmp, $uploadDir . $newName)) {
                    $image = $uploadDir . $newName;
                }
                if (empty($validate)) {
                    $title = $_POST['title'];
                    $category = $_POST['category'];
                    $content = $_POST['content'];
                    $dom = new DOMDocument();
                    $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                    $images = $dom->getElementsByTagName('img');
                    foreach ($images as $key => $img) {
                        $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                        $image_name = "public/uploads/summernote/" . time() . $key . '.png';
                        file_put_contents($image_name, $data);
                        $img->removeAttribute('src');
                        $img->setAttribute('src', "/".$image_name);
                    }
                    $content = mb_convert_encoding($dom->saveHTML(), 'UTF-8', 'HTML-ENTITIES');
                    if ($this->BlogModel->CreateBlog($category, $_SESSION['admin_id'], $title, $content, $image)) {
                        header("Location: /admin");
                        exit();
                    }
                }
            }
        }
        $this->_renderBase->renderHeaderAdmin();
        $this->_renderBase->renderNavbarAdmin();
        $this->load->render("blocks/sidebar", [
            "adminName" => $adminName
        ]);
        $this->load->render("pages/Blog/add", [
            'category' => $categoryModel,
            'validate' => $validate
        ]);
        $this->_renderBase->renderFooterAdmin();
    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $editBlog = $this->BlogModel->GetOneBlogById($id);
        
        $admin_id = $_SESSION['admin_id'];
        $adminName = $this->UserModel->GetOneById($admin_id);
        $categoryModel = $this->CategoryModel->GetAllCategory();
        $validate = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['title'])) {
                $validate += [
                    'TitleValidate' => "Vui lòng nhập tiêu đề"
                ];
            }

            if (empty($_POST['content'])) {
                $validate += [
                    'ContentValidate' => "Vui lòng nhập nội dung"
                ];
            }

            $upload = $_FILES['image'];
            if ($upload['error'] === UPLOAD_ERR_OK) {
                $tmp = $upload['tmp_name'];
                $oldName = $upload['name'];
                $newName = uniqid() . '_' . $oldName;
                $uploadDir = 'public/uploads/';
                if (move_uploaded_file($tmp, $uploadDir . $newName)) {
                    $image = $uploadDir . $newName;
                    }}
                 else {
                    $image = $_POST['thumbnail'];
                }

                    if (empty($validate)) {
                        $title = $_POST['title'];
                        $category = $_POST['category'];
                        $content = $_POST['content'];
                        $dom = new DOMDocument();
                        $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                        $images = $dom->getElementsByTagName('img');
                        foreach ($images as $key => $img) {
                            if (strpos($img->getAttribute('src'),'data:image/') ===0){
                            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                            $image_name = "public/uploads/summernote/" . time() . $key . '.png';
                            file_put_contents($image_name, $data);

                            $img->removeAttribute('src');
                            $img->setAttribute('src',"/".$image_name);
                        }}
                        $content = mb_convert_encoding($dom->saveHTML(), 'UTF-8', 'HTML-ENTITIES');
                        if ($this->BlogModel->EditBlog($title, $category, $content, $image, $_SESSION['admin_id'], $id )) {
                            header("Location: /admin");
                            exit();
                }
            }}
        }

        $this->_renderBase->renderHeaderAdmin();
        $this->_renderBase->renderNavbarAdmin();

        $this->load->render("blocks/sidebar", [
            "adminName" => $adminName
        ]);

        $this->load->render("pages/Blog/edit", [
            'category' => $categoryModel,
            'validate' => $validate,
            'EditBlog' => $editBlog


        ]);

        $this->_renderBase->renderFooterAdmin();
    }

    public function delete()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            try {
                $delete = $this->BlogModel->DeleteBlog($id);
                if ($delete) {
                    header("Location: /admin");
                    exit;
                }
            } catch (PDOException $e) {
                if ($e->getCode() == 23000) {
                    echo "Không thể xóa thể loại này vì có bài viết liên quan đến nó. Vui lòng xóa hoặc chuyển các bài viết trước.";
                } else {
                    echo "Đã xảy ra lỗi khi xóa thể loại: " . $e->getMessage();
                }
            }
        }
    }
}
