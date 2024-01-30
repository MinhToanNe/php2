<?php
use App\Core\Controller;
class AdminController extends Controller
{
    public function index()
    {
        
        $this->view('AdminLayout', [
            'pages' => 'homeAdminLayout',
        ]);
    }
}