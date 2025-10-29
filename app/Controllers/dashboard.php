<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
       $data = [
        'judul' => '',
        'subjudul' => '',
        'page' => 'admin/v_dashboard',
       ];
       return viev('v_template_back',$data);
    }
}
