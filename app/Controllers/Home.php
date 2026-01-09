<?php

namespace App\Controllers;

use App\Models\ModelSlider;

class Home extends BaseController
{
    protected $ModelSlider;
    
    public function __construct()
    {
        $this->ModelSlider = new ModelSlider();
    }
    
    public function index()
    {
        $data = [
            'judul' => 'Home',
            'subjudul' => 'Home Page',
            'page' => 'v_home',
            'sliders' => $this->ModelSlider->allData() ?? [],
        ];
        return view('v_front_end', $data);
    }
}
