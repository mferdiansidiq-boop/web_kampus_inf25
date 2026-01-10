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

    public function update_header()
    {
        $header = $this->request->getPost('header');
        $file = $this->request->getFile('logo_header');
        
        $data = [];
        
        // Update header jika ada
        if (!empty($header)) {
            $data['header'] = $header;
        }
        
        // Update logo header jika ada file
        if ($file && $file->getError() !== 4) {
            $namaFile = $file->getRandomName();
            $file->move('uploads/logo/', $namaFile);
            $data['logo_header'] = $namaFile;
        }
        
        // Jika ada data yang diupdate
        if (!empty($data)) {
            $this->ModelSetting->update(1, $data);
            return redirect()->to(base_url('admin/setting/header'))->with('sukses', 'Header berhasil diupdate');
        } else {
            return redirect()->to(base_url('admin/setting/header'))->with('error', 'Tidak ada data yang diubah');
        }
    }
   

    // ===== KAMPUS =====
    public function logo()
    {
        $setting = $this->ModelSetting->DataKampus() ?? [];
        
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Logo Kampus',
            'menu' => 'setting',
            'submenu' => 'logo',
            'page' => 'admin/setting/v_logo',
            'setting' => $setting
        ];
        
        return view('v_back_end', $data);
    }

    public function update_logo()
    {
        $file = $this->request->getFile('logo_kampus');
        
        if ($file && $file->getError() !== 4) {
            // File ada dan valid
            $namaFile = $file->getRandomName();
            $file->move('uploads/logo/', $namaFile);
            
            $data = [
                'logo_kampus' => $namaFile,
            ];
            
            $this->ModelSetting->update(1, $data);
            return redirect()->to(base_url('admin/setting/logo'))->with('sukses', 'Logo Kampus berhasil diupdate');
        } else {
            // File tidak ada atau error
            return redirect()->to(base_url('admin/setting/logo'))->with('error', 'Pilih file logo terlebih dahulu');
        }
    }

     // ===== SAMBUTAN =====
    public function kampus()
    {
        $setting = $this->ModelSetting->DataKampus() ?? [];
        
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Data Kampus',
            'menu' => 'setting',
            'submenu' => 'kampus',
            'page' => 'admin/setting/v_kampus',
            'setting' => $setting
        ];
        
        return view('v_back_end', $data);
    }

    public function update_kampus()
    {
        $nama_kampus = $this->request->getPost('nama_kampus');
        $alamat = $this->request->getPost('alamat');
        $no_telp = $this->request->getPost('no_telp');
        $email = $this->request->getPost('email');
        $operasional = $this->request->getPost('operasional');
        $instagram = $this->request->getPost('instagram');
        $facebook = $this->request->getPost('facebook');
        $twiter = $this->request->getPost('twiter');
        $linkedin = $this->request->getPost('linkedin');
        $youtube = $this->request->getPost('youtube');
        
        $data = [];
        
        // Update nama kampus jika ada
        if (!empty($nama_kampus)) {
            $data['nama_kampus'] = $nama_kampus;
        }
        
        // Update alamat jika ada
        if (!empty($alamat)) {
            $data['alamat'] = $alamat;
        }
        
        // Update no telp jika ada
        if (!empty($no_telp)) {
            $data['no_telp'] = $no_telp;
        }
        
        // Update email jika ada
        if (!empty($email)) {
            $data['email'] = $email;
        }
        
        // Update jam operasional jika ada
        if (!empty($operasional)) {
            $data['operasional'] = $operasional;
        }
        
        // Update social media jika ada
        if (!empty($instagram)) {
            $data['instagram'] = $instagram;
        }
        if (!empty($facebook)) {
            $data['facebook'] = $facebook;
        }
        if (!empty($twiter)) {
            $data['twiter'] = $twiter;
        }
        if (!empty($linkedin)) {
            $data['linkedin'] = $linkedin;
        }
        if (!empty($youtube)) {
            $data['youtube'] = $youtube;
        }
        
        // Jika ada data yang diupdate
        if (!empty($data)) {
            $this->ModelSetting->update(1, $data);
            return redirect()->to(base_url('admin/setting/kampus'))->with('sukses', 'Data Kampus berhasil diupdate');
        } else {
            return redirect()->to(base_url('admin/setting/kampus'))->with('error', 'Tidak ada data yang diubah');
        }
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

