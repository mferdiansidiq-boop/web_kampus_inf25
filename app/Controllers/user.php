<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
       $data = [
        'judul' => 'User',
        'subjudul' => 'user',
        'menu' => 'User',
        'submenu' => 'User',
        'page' => 'admin/v_User',
       ];
       return view('v_template_back',$data);

    }
}
