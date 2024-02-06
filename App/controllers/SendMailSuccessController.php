<?php

use App\controllers\BaseController;



class SendMailSuccessController extends BaseController
{

    public function index()
    {
        
        $this->load->render('pages/SuccessMail');
    }
}
