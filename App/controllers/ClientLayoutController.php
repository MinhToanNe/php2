<?php
use App\Core\Controller;
use App\Core\render;

class Clientlayoutcontroller extends render
{
    public function index()
    {

        $this->render('ClientLayout', [
            'pages' => 'homeClientLayout',
        ]);
    }
}
