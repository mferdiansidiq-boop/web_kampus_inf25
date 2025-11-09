<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class User extends BaseController

{
    public function index(): string
    {
        $data = [    
            'judul' => 'User',
            'subjudul' => 'user',
            'menu' => 'user',
            'page' => 'admin/v_user',
        ];
        return view('v_template_back',$data);
    }
}