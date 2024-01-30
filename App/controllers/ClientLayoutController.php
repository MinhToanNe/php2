<?php
use App\Core\Controller;
class Clientlayoutcontroller extends Controller
{
    public function index()
    {

        $this->view('ClientLayout', [
            'pages' => 'homeClientLayout',
        ]);
    }
}
