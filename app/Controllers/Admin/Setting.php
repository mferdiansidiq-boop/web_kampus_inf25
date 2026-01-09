<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelSetting;

class Setting extends BaseController
{
    protected $ModelSetting;
    
    public function __construct()
    {
        helper('form');
        $this->ModelSetting = new ModelSetting();
    }

    // ===== HEADER =====
    public function header()
    {
        $setting = $this->ModelSetting->DataKampus() ?? [];
        
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Pengaturan Header',
            'menu' => 'setting',
            'submenu' => 'header',
            'page' => 'admin/setting/v_header',
            'setting' => $setting
        ];
        
        return view('v_back_end', $data);
    }

   

    // ===== KAMPUS =====
    public function kampus()
    {
        $setting = $this->ModelSetting->DataKampus() ?? [];
        
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Informasi Kampus',
            'menu' => 'setting',
            'submenu' => 'kampus',
            'page' => 'admin/setting/v_kampus',
            'setting' => $setting
        ];
        
        return view('v_back_end', $data);
    }

    

    // ===== SAMBUTAN =====
    public function sambutan()
    {
        $setting = $this->ModelSetting->DataKampus() ?? [];
        
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Sambutan Pimpinan',
            'menu' => 'setting',
            'submenu' => 'sambutan',
            'page' => 'admin/setting/v_sambutan',
            'setting' => $setting
        ];
        
        return view('v_back_end', $data);
    }

    
}

