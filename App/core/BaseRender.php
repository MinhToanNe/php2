<?php

namespace App\Core;

use App\controllers\BaseController;

class BaseRender extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function renderHeader()
    {
        $this->load->render("/blocks/HeaderClient");
    }

    public function renderHeaderAdmin()
    {
        $this->load->render("/blocks/AdminHeader");
    }

    public function renderNavbarAdmin()
    {
        $this->load->render("/blocks/navbar");
    }

    public function renderSidebarAdmin()
    {
        $this->load->render("/blocks/sidebar");
    }
    public function renderFooterAdmin()
    {
        $this->load->render("/blocks/AdminFooter");
    }

}