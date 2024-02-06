<?php

use App\controllers\BaseController;
use App\Core\BaseRender;


class Homecontroller extends BaseController
{
    private $_renderBase;
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new BaseRender();
    }
    public function index()
    {

        $this->_renderBase->renderHeader();
        $this->load->render('pages/homeClientLayout');
        
    }


}
