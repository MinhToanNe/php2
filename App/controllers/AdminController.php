<?php
use App\controllers\BaseController;
use App\Core\BaseRender;

class AdminController extends BaseController
{
    private $_renderBase;
    public function __construct()
    {
        checkAdmin();
        parent::__construct();
        $this->_renderBase = new BaseRender();

    }
    public function index()
    {
        $data= "";
        $this->_renderBase->renderHeaderAdmin();
        $this->_renderBase->renderNavbarAdmin();
        $this->_renderBase->renderSidebarAdmin();
        $this->load->render("pages/homeAdminLayout");
        $this->_renderBase->renderFooterAdmin();
        
    }
}