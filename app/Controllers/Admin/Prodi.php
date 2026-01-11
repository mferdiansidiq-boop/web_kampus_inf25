<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelProdi;

class Prodi extends BaseController
{
    protected $ModelProdi;

    // Validation Rules
    protected $ProdiInsertRules = [
        'nama_prodi' => 'required|string|min_length[3]|max_length[100]|is_unique[tbl_prodi.nama_prodi]',
        'deskripsi_prodi' => 'required',
    ];

    protected $ProdiInsertMessages = [
        'nama_prodi' => [
            'required'   => 'Nama Prodi harus diisi',
            'string'     => 'Nama Prodi harus berupa teks',
            'min_length' => 'Nama Prodi minimal 3 karakter',
            'max_length' => 'Nama Prodi maksimal 100 karakter',
            'is_unique'  => 'Nama Prodi sudah terdaftar',
        ],
        'deskripsi_prodi' => [
            'required'   => 'Deskripsi Prodi harus diisi',
        ],
    ];
       
    

    protected $ProdiUpdateRules = [
        'nama_prodi' => 'required|string|min_length[3]|max_length[100]',
        'deskripsi_prodi' => 'required',
    ];

    protected $ProdiUpdateMessages = [
        'nama_prodi' => [
            'required'   => 'Nama Prodi harus diisi',
            'string'     => 'Nama Prodi harus berupa teks',
            'min_length' => 'Nama Prodi minimal 3 karakter',
            'max_length' => 'Nama Prodi maksimal 100 karakter',
        ],
        'deskripsi_prodi' => [
            'required'   => 'Deskripsi Prodi harus diisi',
        ],
           
    ];

    public function __construct()
    {
        $this->ModelProdi = new ModelProdi();
    }

    public function index()
    {
        $data = [
            'judul' => 'Prodi',
            'subjudul' => 'Prodi',
            'menu' => 'prodi',
            'submenu' => 'prodi',
            'page' => 'admin/prodi/v_index',
            'prodi' => $this->ModelProdi->allData(),
        ];
        
        return view('v_back_end', $data);
    }

    public function input()
    {
        $data = [
            'judul' => 'Prodi',
            'subjudul' => 'Prodi',
            'menu' => 'prodi',
            'submenu' => 'prodi',
            'page' => 'admin/prodi/v_input',
            'prodi' => $this->ModelProdi->allData(),
        ];
        
        return view('v_back_end', $data);
    }

    public function insert()
    {
        // Validasi input
        if (!$this->validate($this->ProdiInsertRules, $this->ProdiInsertMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama_prodi' => $this->request->getPost('nama_prodi'),
            'deskripsi_prodi' => $this->request->getPost('deskripsi_prodi'),
        ];

        $this->ModelProdi->insertData($data);
        Session()->setFlashdata('insert', 'Prodi Berhasil Ditambahkan !');

        return redirect()->to('Admin/Prodi');
    }
    public function edit($id_prodi)
    {
        $data = [
            'judul' => 'Edit Prodi',
            'subjudul' => 'Prodi',
            'menu' => 'prodi',
            'submenu' => 'prodi',
            'page' => 'admin/prodi/v_edit',
            'prodi' => $this->ModelProdi->getDataById($id_prodi),
        ];
        
        return view('v_back_end', $data);
    }

    public function update($id_prodi)
    {
        // Validasi input
        if (!$this->validate($this->ProdiUpdateRules, $this->ProdiUpdateMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id_prodi'   => $id_prodi,
            'nama_prodi' => $this->request->getPost('nama_prodi'),
            'deskripsi_prodi' => $this->request->getPost('deskripsi_prodi'),
        ];

        $this->ModelProdi->updateData($data);
        Session()->setFlashdata('update', 'Prodi Berhasil Diupdate !');

        return redirect()->to('Admin/Prodi');
    }

    public function delete($id_prodi)
    {
        $data = [
            'id_prodi' => $id_prodi,
        ];

        $this->ModelProdi->deleteData($data);
        Session()->setFlashdata('delete', 'Prodi Berhasil Dihapus !');

        return redirect()->to('Admin/Prodi');
    }
}
