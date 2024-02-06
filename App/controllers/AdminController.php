<?php
use App\controllers\BaseController;
use App\Core\BaseRender;

class AdminController extends BaseController
{
    private $_renderBase;
    private $UserInfor;
    public function __construct()
    {
        checkAdmin();
        parent::__construct();
        $this->_renderBase = new BaseRender();
        $this->UserInfor = $this->load->renderModels("UserModel");

    }
    public function index()
    {

        $id = $_SESSION['admin_id'];
        $data= $this->UserInfor->GetOneById($id);
        $this->_renderBase->renderHeaderAdmin();
        $this->_renderBase->renderNavbarAdmin();
        $this->load->render("blocks/sidebar",$data);
        $this->load->render("pages/homeAdminLayout");
        $this->_renderBase->renderFooterAdmin();
        
    }
}