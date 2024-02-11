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
        $this->categoryModel= $this->load->renderModels("CategoryModel");
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
        
    }

}