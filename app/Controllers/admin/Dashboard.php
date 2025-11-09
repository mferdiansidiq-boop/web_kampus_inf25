<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Dashboard extends BaseController

{
    public function index()
    {
        $data = [    
            'judul' => 'Dashboard',
            'subjudul' => 'dashboard',
            'menu' => 'dashboard',
            'page' => 'admin/v_dashboard',
        ];
        return view('v_template_back',$data);
    }
}
