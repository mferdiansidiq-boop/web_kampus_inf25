<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Controllers\BaseCountoller;
use App\Model\ModulUser;

class User extends BaseController
{

    public function __construct()
    {
        $this->ModelUser = new modelUser();
    }
    public function index()
    {
        $data = [
            'judul' => 'User',
            'subjudul' => 'User',
            'menu' => 'User',
            'submenu' => 'User',
            'page' => 'admin/v_user',
            'user' => $this->ModelUser->allData(),
        ];
        return view('v_template_back',$data);
    }
}