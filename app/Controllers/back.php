<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;

class Back extends BaseController
{
    public function index()
    {
        return view('back/index');
    }
}
