<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;

class User extends BaseController

{
    public function index()
    {
        $data = [    
            'judul' => 'user',
            'subjudul' => 'user',
            'page' => 'admin/v_user',
        ];
        return view('v_template_back',$data);
    }
}
