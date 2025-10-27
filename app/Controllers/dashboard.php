<?php

namespace App\Controllers;
use App\Controller\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
       $data = [
        'judul' => '',
        'subjudul' => '',
        'menu' => 'dashboard',
        'submenu' => 'dashboard'
        'page' => 'admin/v_dashboard',
       ];
       return view('v_template_back',$data);

    }
}
