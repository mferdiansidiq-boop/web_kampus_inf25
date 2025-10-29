<?php

<<<<<<< HEAD
namespace App\Controllers\Admin;
=======
namespace App\Controllers;
>>>>>>> caad44a0bf8e6c17cf96c33f5b1534e441684c64
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
       $data = [
        'judul' => '',
        'subjudul' => '',
<<<<<<< HEAD
        'page' => 'admin/v_dashboard',
       ];
       return viev('v_template_back',$data);
=======
        'menu' => 'dashboard',
        'submenu' => 'dashboard',
        'page' => 'admin/v_dashboard',
       ];
       return view('v_template_back',$data);

>>>>>>> caad44a0bf8e6c17cf96c33f5b1534e441684c64
    }
}
