<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelSetting;

class Profile extends BaseController
{
    protected $ModelSetting;
    
    public function __construct()
    {
        helper('form');
        $this->ModelSetting = new ModelSetting();
    }

    // ===== HEADER =====
    public function sejarah()
    {
        $setting = $this->ModelSetting->DataKampus() ?? [];
        
        $data = [
            'judul' => 'Profile',
            'subjudul' => 'Sejarah Kampus',
            'menu' => 'profile',
            'submenu' => 'sejarah',
            'page' => 'admin/profile/v_sejarah',
            'setting' => $setting
        ];
        
        return view('v_back_end', $data);
    }

    public function update_sejarah()
    {
        $sejarah = $this->request->getPost('sejarah');
        
        $data = [];

        // Update sejarah jika ada (trim whitespace dan remove HTML tags untuk check kosong)
        if (!empty(trim(strip_tags($sejarah)))) {
            $data['sejarah'] = $sejarah;
        }
             
        // Jika ada data yang diupdate
        if (!empty($data)) {
            $this->ModelSetting->update(1, $data);
            return redirect()->to(base_url('admin/profile/sejarah'))->with('sukses', 'Sejarah berhasil diupdate');
        } else {
            return redirect()->to(base_url('admin/profile/sejarah'))->with('error', 'Tidak ada data yang diubah');
        }
    }
   

    public function visimisi()
    {
        $setting = $this->ModelSetting->DataKampus() ?? [];
        
        $data = [
            'judul' => 'Profile',
            'subjudul' => 'Visi & Misi Kampus',
            'menu' => 'profile',
            'submenu' => 'visimisi',
            'page' => 'admin/profile/v_visimisi',
            'setting' => $setting
        ];
        
        return view('v_back_end', $data);
    }

    public function update_visimisi()
    {
        $visi = $this->request->getPost('visi');
        $misi = $this->request->getPost('misi');

        $data = [];

        // Update visi jika ada (trim whitespace dan remove HTML tags untuk check kosong)
        if (!empty(trim(strip_tags($visi)))) {
            $data['visi'] = $visi;
        }

        // Update misi jika ada (trim whitespace dan remove HTML tags untuk check kosong)
        if (!empty(trim(strip_tags($misi)))) {
            $data['misi'] = $misi;
        }
        
             
        // Jika ada data yang diupdate
        if (!empty($data)) {
            $this->ModelSetting->update(1, $data);
            return redirect()->to(base_url('admin/profile/visimisi'))->with('sukses', 'Visi & Misi  berhasil diupdate');
        } else {
            return redirect()->to(base_url('admin/profile/visimisi'))->with('error', 'Tidak ada data yang diubah');
        }
    }

    public function organisasi()
    {
        $setting = $this->ModelSetting->DataKampus() ?? [];
        
        $data = [
            'judul' => 'Profile',
            'subjudul' => 'Struktur Organisasi',
            'menu' => 'profile',
            'submenu' => 'organisasi',
            'page' => 'admin/profile/v_organisasi',
            'setting' => $setting
        ];
        
        return view('v_back_end', $data);
    }

    public function update_organisasi()
    {
        $file = $this->request->getFile('organisasi');
        
        if ($file && $file->getError() !== 4) {
            // File ada dan valid
            $namaFile = $file->getRandomName();
            $file->move('uploads/kampus/', $namaFile);
            
            $data = [
                'organisasi' => $namaFile,
            ];
            
            $this->ModelSetting->update(1, $data);
            return redirect()->to(base_url('admin/profile/organisasi'))->with('sukses', 'Organisasi Kampus berhasil diupdate');
        } else {
            // File tidak ada atau error
            return redirect()->to(base_url('admin/profile/organisasi'))->with('error', 'Pilih file organisasi terlebih dahulu');
        }
    }
}

