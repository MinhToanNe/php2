<?php

use App\controllers\BaseController;
use App\Core\BaseRender;


class Homecontroller extends BaseController
{
    private $BlogModel;
    private $CategoryModel;
    private $_renderBase;
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new BaseRender();
        $this->BlogModel = $this->load->renderModels("BlogModel");
        $this->CategoryModel = $this->load->renderModels("CategoryModel");
        
    }
    public function index()
    {
        $totalItem = $this->BlogModel->CoutBlog();
        $itemPerPage = 4;
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $totalPage =  ceil($totalItem / $itemPerPage);
        $starIndex =  ($currentPage - 1) * $itemPerPage;
        if(isset($_GET['SearchKey']))
        {
            $Blog = $this->BlogModel->SearchBlog(trim($_GET['SearchKey']));
        }
        else if(isset($_GET['category_id']))
        {
            $Blog = $this->BlogModel->GetBlogByCategory($_GET['category_id']);
        }
        else
        {
            $Blog = $this->BlogModel->GetAllBlogLimit($starIndex, $itemPerPage);
        }
       

    


        $this->_renderBase->renderHeader();
        $this->load->render('pages/homeClientLayout',[
               'Blog' => $Blog,
               'Category' => $this->CategoryModel->GetAllCategory(),
               'RecentBlog' => $this->BlogModel->GetBlogRecent(),
               'TotalPage'  => $totalPage              
        ]);
        $this->_renderBase->renderFooter();
        
    }

    public function detailBlog()
    {
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
        }
        $this->_renderBase->renderHeader();
        $this->load->render('pages/DetailBlogPage',[
             
               'Category' => $this->CategoryModel->GetAllCategory(),
               'RecentBlog' => $this->BlogModel->GetBlogRecent(),
               'Blog' => $this->BlogModel->GetOneBlogById($id)
                            
        ]);
        $this->_renderBase->renderFooter(); 
    }


}
