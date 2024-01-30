<?php
use App\Core\Controller;
use App\Core\render;

class AdminController extends render
{
    public function index()
    {
        
        $this->render('AdminLayout', [
            'pages' => 'homeAdminLayout',
        ]);
    }
}