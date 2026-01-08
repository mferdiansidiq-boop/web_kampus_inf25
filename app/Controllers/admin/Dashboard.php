<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'subjudul' => 'Dashboard',
            'menu' => 'dashboard',
            'submenu' => 'dashboard',
            'page' => 'admin/v_dashboard'
        ];
        
        return view('v_back_end', $data);
    }
}
