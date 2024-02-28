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
        $itemPerPage = 4;
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $starIndex =  ($currentPage - 1) * $itemPerPage;
        if (isset($_GET['SearchKey']))
         {
            $Blog = $this->BlogModel->SearchBlog(trim($_GET['SearchKey']),$starIndex, $itemPerPage);
            $totalItem = $this->BlogModel->CoutBlogSearch($_GET['SearchKey'],);
            $param = "/?SearchKey=" . trim($_GET["SearchKey"])."&page=";

        }
         else if (isset($_GET['category_id']))
          {
            $Blog = $this->BlogModel->GetBlogByCategory($_GET['category_id'],$starIndex, $itemPerPage);
            $totalItem = $this->BlogModel->CoutBlogCategry($_GET['category_id']);
            $param = "/?category_id=" . trim($_GET["category_id"])."&page=";
        } 
        else 
        {
            $Blog = $this->BlogModel->GetAllBlogLimit($starIndex, $itemPerPage);
            $totalItem = $this->BlogModel->CoutBlog();
            $param = "/?page=";
        }
        $totalPage =  ceil($totalItem / $itemPerPage);
        // echo $totalItem;

        $this->_renderBase->renderHeader();
        $this->load->render('pages/homeClientLayout', [
            'Blog' => $Blog,
            'Category' => $this->CategoryModel->GetAllCategory(),
            'RecentBlog' => $this->BlogModel->GetBlogRecent(),
            'TotalPage'  => $totalPage,
            "href" => $param
        ]);
        $this->_renderBase->renderFooter();
    }

    public function detailBlog()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $this->_renderBase->renderHeader();
        $this->load->render('pages/DetailBlogPage', [

            'Category' => $this->CategoryModel->GetAllCategory(),
            'RecentBlog' => $this->BlogModel->GetBlogRecent(),
            'Blog' => $this->BlogModel->GetOneBlogById($id)

        ]);
        $this->_renderBase->renderFooter();
    }
}
