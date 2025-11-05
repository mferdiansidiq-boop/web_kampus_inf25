<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
       $data = [
        'judul' => 'User',
        'subjudul' => 'User',
        'menu' => 'user',
        'submenu' => 'user',
        'page' => 'admin/v_user',
       ];
       return view('v_template_back',$data);

    }
}
