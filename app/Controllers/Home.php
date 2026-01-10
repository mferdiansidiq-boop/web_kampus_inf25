<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ModelSlider;
use App\Models\ModelSetting;

class Home extends BaseController
{
    protected $ModelSlider;
    protected $ModelSetting;
    
    public function __construct()
    {
        helper('form');
        $this->ModelSlider = new ModelSlider();
        $this->ModelSetting = new ModelSetting();
    }
    
    public function index()
    {
        $data = [
            'judul' => 'Home',
            'subjudul' => 'Home Page',
            'page' => 'v_home',
            'sliders' => $this->ModelSlider->allData() ?? [],
            'setting' => $this->ModelSetting->DataKampus() ?? [],

        ];
        return view('v_front_end', $data);
    }

    public function organisasi()
    {
        $data = [
            'judul' => 'Sruktur Organisasi',
            'subjudul' => 'Struktur Organisasi',
            'page' => 'v_organisasi',
            'setting' => $this->ModelSetting->DataKampus() ?? [],

        ];
        return view('v_front_end', $data);
    }

    public function sejarah()
    {
        $data = [
            'judul' => 'Sejarah',
            'subjudul' => 'Sejarah',
            'page' => 'v_sejarah',
            'setting' => $this->ModelSetting->DataKampus() ?? [],

        ];
        return view('v_front_end', $data);
    }

     public function visimisi()
    {
        $data = [
            'judul' => 'Visi Misi',
            'subjudul' => 'Visi Misi',
            'page' => 'v_visimisi',
            'setting' => $this->ModelSetting->DataKampus() ?? [],

        ];
        return view('v_front_end', $data);
    }


}
