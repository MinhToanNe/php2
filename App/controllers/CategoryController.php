<?php

use App\controllers\BaseController;
use App\Core\BaseRender;

class CategoryController extends BaseController
{
    private $_renderBase;
    private $categoryModel;
    private $UserModel;


    public function __construct()
    {
        checkAdmin();
        parent::__construct();
        $this->_renderBase = new BaseRender();
        $this->categoryModel = $this->load->renderModels("CategoryModel");
        $this->UserModel = $this->load->renderModels("UserModel");
    }

    public function index()
    {
        $id = $_SESSION['admin_id'];

        $adminName = $this->UserModel->GetOneById($id);
        $categorys = $this->categoryModel->GetAllCategory();

        $this->_renderBase->renderHeaderAdmin();
        $this->_renderBase->renderNavbarAdmin();

        $this->load->render("blocks/sidebar", [
            "adminName" => $adminName
        ]);

        $this->load->render("pages/BlogCategory/list", [
            "category" => $categorys
        ]);

        $this->_renderBase->renderFooterAdmin();
    }

    public function add()
    {
        $id = $_SESSION['admin_id'];
        $adminName = $this->UserModel->GetOneById($id);
        $validateName = [
            "name" => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_POST['name'];
            if (empty($_POST['name'])) {
                $validateName = [
                    "name" => "Tên danh mục không được trống"
                ];
            } else {
                $add = $this->categoryModel->CreateCategory($name);
                if ($add) {
                    header("Location: /category");
                }
            }
        }


        $this->_renderBase->renderHeaderAdmin();
        $this->_renderBase->renderNavbarAdmin();
        $this->load->render("blocks/sidebar", [
            "adminName" => $adminName
        ]);
        $this->load->render("pages/BlogCategory/add", [
            "validateName" => $validateName
        ]);

        $this->_renderBase->renderFooterAdmin();
    }

    public function edit()
    {
        $id = $_SESSION['admin_id'];
        $adminName = $this->UserModel->GetOneById($id);
        $validateName = [
            "name" => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_POST['name'];
            if (empty($_POST['name'])) {
                $validateName = [
                    "name" => "Tên danh mục không được trống"
                ];
            } else 
            {
                $this->categoryModel->edit($_POST['name']);
                header("Location: /category");
            }
        }
        $this->_renderBase->renderHeaderAdmin();
        $this->_renderBase->renderNavbarAdmin();
        $this->load->render("blocks/sidebar", [
            "adminName" => $adminName
        ]);
        $this->load->render("pages/BlogCategory/edit", [
            "validateName" => $validateName,
            "ValueCategory" => $this->categoryModel->GetOneById()
        ]);

        $this->_renderBase->renderFooterAdmin();
    }

    // public function delete()
    // {
    //     if (isset($_POST['id'])) {
    //         $id = $_POST['id'];
    //         $delete = $this->categoryModel->DeleteCategory($id);
    //         if ($delete) {
    //             header("Location: /category");
    //         }
    //     }
    // }

    public function delete()
{
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        
        try {
            $delete = $this->categoryModel->DeleteCategory($id);
            if ($delete) {
                header("Location: /category");
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
