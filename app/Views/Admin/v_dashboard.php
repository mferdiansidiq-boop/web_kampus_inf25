<?php

namespace App\Controllers\Admin;
use App\Controllres\BaseController;

class Dasboard Home extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => '',
            'subjudul' => '',
            'page' => 'admin/v_dashboard',
        ];
        return view('v_template_back',$data);
    } 
}
