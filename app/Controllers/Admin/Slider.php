<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelSlider;

class Slider extends BaseController
{
    protected $ModelSlider;
    
    public function __construct()
    {
        helper('form');
        $this->ModelSlider = new ModelSlider();
    }
    
    // READ - Tampilkan daftar slider
    public function index()
    {
        $sliderData = $this->ModelSlider->allData();
        
        $data = [
            'judul' => 'Data Slider',
            'subjudul' => 'Daftar Slider',
            'menu' => 'slider',
            'submenu' => 'slider',
            'page' => 'admin/slider/v_index',
            'slider' => $sliderData ? $sliderData : [],
        ];
        
        return view('v_back_end', $data);
    }
    
    // CREATE - Form input slider baru
    public function input()
    {
        $data = [
            'judul' => 'Tambah Slider',
            'subjudul' => 'Form Tambah Slider',
            'menu' => 'slider',
            'submenu' => 'slider',
            'page' => 'admin/slider/v_input',
        ];
        
        return view('v_back_end', $data);
    }
    
    // STORE - Simpan slider baru ke database
    public function store()
    {
        // Validasi input dengan pesan error dalam bahasa Indonesia
        $rules = [
            'judul_slider' => 'required|min_length[3]|max_length[255]',
            'url_terkait' => 'required|valid_url',
            'gambar_slider' => 'uploaded[gambar_slider]|is_image[gambar_slider]|max_size[gambar_slider,5120]'
        ];
        
        $messages = [
            'judul_slider' => [
                'required' => 'Judul slider harus diisi',
                'min_length' => 'Judul slider minimal 3 karakter',
                'max_length' => 'Judul slider maksimal 255 karakter',
            ],
            'url_terkait' => [
                'required' => 'URL terkait harus diisi',
                'valid_url' => 'URL terkait harus format URL yang valid (contoh: https://example.com)',
            ],
            'gambar_slider' => [
                'uploaded' => 'Gambar slider harus diunggah',
                'is_image' => 'File yang diunggah harus berupa gambar (JPG, PNG, GIF)',
                'max_size' => 'Ukuran gambar maksimal 5MB',
            ],
        ];
        
        if (!$this->validate($rules, $messages)) {
            session()->setFlashdata('validation_errors', $this->validator->getErrors());
            session()->setFlashdata('old_input', [
                'judul_slider' => $this->request->getPost('judul_slider'),
                'url_terkait' => $this->request->getPost('url_terkait'),
            ]);
            return redirect()->back();
        }
        
        // Handle file upload
        $file = $this->request->getFile('gambar_slider');
        $fileName = $file->getRandomName();
        
        // Pindahkan file ke folder uploads/slider
        $file->move(ROOTPATH . 'public/uploads/slider/', $fileName);
        
        // Simpan data ke database
        $data = [
            'judul_slider' => $this->request->getPost('judul_slider'),
            'url_terkait' => $this->request->getPost('url_terkait'),
            'gambar_slider' => $fileName,
        ];
        
        $this->ModelSlider->insertData($data);
        
        return redirect()->to(base_url('admin/slider'))
                        ->with('insert', 'Data slider berhasil ditambahkan!');
    }
    
    // EDIT - Form edit slider
    public function edit($id_slider)
    {
        $sliderData = $this->ModelSlider->getDataById($id_slider);
        
        if (!$sliderData) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data slider tidak ditemukan');
        }
        
        $data = [
            'judul' => 'Edit Slider',
            'subjudul' => 'Form Edit Slider',
            'menu' => 'slider',
            'submenu' => 'slider',
            'page' => 'admin/slider/v_edit',
            'slider' => $sliderData,
        ];
        
        return view('v_back_end', $data);
    }
    
    // UPDATE - Update data slider di database
    public function update($id_slider)
    {
        $sliderData = $this->ModelSlider->getDataById($id_slider);
        
        if (!$sliderData) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data slider tidak ditemukan');
        }
        
        // Validasi input dengan pesan error dalam bahasa Indonesia
        $rules = [
            'judul_slider' => 'required|min_length[3]|max_length[255]',
            'url_terkait' => 'required|valid_url',
        ];
        
        $messages = [
            'judul_slider' => [
                'required' => 'Judul slider harus diisi',
                'min_length' => 'Judul slider minimal 3 karakter',
                'max_length' => 'Judul slider maksimal 255 karakter',
            ],
            'url_terkait' => [
                'required' => 'URL terkait harus diisi',
                'valid_url' => 'URL terkait harus format URL yang valid (contoh: https://example.com)',
            ],
        ];
        
        // Validasi file hanya jika ada file baru yang diupload
        $file = $this->request->getFile('gambar_slider');
        if ($file && $file->getError() === 0) {
            $rules['gambar_slider'] = 'is_image[gambar_slider]|max_size[gambar_slider,5120]';
            $messages['gambar_slider'] = [
                'is_image' => 'File yang diunggah harus berupa gambar (JPG, PNG, GIF)',
                'max_size' => 'Ukuran gambar maksimal 5MB',
            ];
        }
        
        if (!$this->validate($rules, $messages)) {
            session()->setFlashdata('validation_errors', $this->validator->getErrors());
            session()->setFlashdata('old_input', [
                'judul_slider' => $this->request->getPost('judul_slider'),
                'url_terkait' => $this->request->getPost('url_terkait'),
            ]);
            return redirect()->back();
        }
        
        // Handle file upload jika ada file baru
        $fileName = $sliderData['gambar_slider'];
        if ($file && $file->getError() === 0) {
            // Hapus file lama
            $oldFilePath = ROOTPATH . 'public/uploads/slider/' . $sliderData['gambar_slider'];
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
            
            // Upload file baru
            $fileName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/slider/', $fileName);
        }
        
        // Update data di database
        $dataUpdate = [
            'id_slider' => $id_slider,
            'judul_slider' => $this->request->getPost('judul_slider'),
            'url_terkait' => $this->request->getPost('url_terkait'),
            'gambar_slider' => $fileName,
        ];
        
        $this->ModelSlider->updateData($dataUpdate);
        
        return redirect()->to(base_url('admin/slider'))
                        ->with('insert', 'Data slider berhasil diupdate!');
    }
    
    // DELETE - Hapus slider dari database
    public function delete($id_slider)
    {
        $sliderData = $this->ModelSlider->getDataById($id_slider);
        
        if (!$sliderData) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data slider tidak ditemukan');
        }
        
        // Hapus file gambar
        $filePath = ROOTPATH . 'public/uploads/slider/' . $sliderData['gambar_slider'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        
        // Hapus data dari database
        $this->ModelSlider->deleteData(['id_slider' => $id_slider]);
        
        return redirect()->to(base_url('admin/slider'))
                        ->with('delete', 'Data slider berhasil dihapus!');
    }
}
