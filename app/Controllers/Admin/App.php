<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelApp;

class App extends BaseController
{
    protected $ModelApp;

    // Validation Rules
    protected $appInsertRules = [
        'nama_app' => 'required|string|min_length[3]|max_length[100]|is_unique[tbl_app.nama_app]',
        'link_app' => 'required|string|min_length[5]|max_length[255]',
    ];

    protected $appInsertMessages = [
        'nama_app' => [
            'required'   => 'Nama app harus diisi',
            'string'     => 'Nama app harus berupa teks',
            'min_length' => 'Nama app minimal 3 karakter',
            'max_length' => 'Nama app maksimal 100 karakter',
            'is_unique'  => 'Nama app sudah terdaftar',
        ],
        'link_app' => [
            'required'   => 'Link app harus diisi',
            'string'     => 'Link app harus berupa teks',
            'min_length' => 'Link app minimal 5 karakter',
            'max_length' => 'Link app maksimal 255 karakter',
        ],
    ];

    protected $appUpdateRules = [
        'nama_app' => 'required|string|min_length[3]|max_length[100]',
        'link_app' => 'required|string|min_length[5]|max_length[255]',
    ];

    protected $appUpdateMessages = [
        'nama_app' => [
            'required'   => 'Nama app harus diisi',
            'string'     => 'Nama app harus berupa teks',
            'min_length' => 'Nama app minimal 3 karakter',
            'max_length' => 'Nama app maksimal 100 karakter',
        ],
        'link_app' => [
            'required'   => 'Link app harus diisi',
            'string'     => 'Link app harus berupa teks',
            'min_length' => 'Link app minimal 5 karakter',
            'max_length' => 'Link app maksimal 255 karakter',
        ],
    ];

    public function __construct()
    {
        $this->ModelApp = new ModelApp();
    }

    public function index()
    {
        $data = [
            'judul' => 'App',
            'subjudul' => 'App',
            'menu' => 'app',
            'submenu' => 'app',
            'page' => 'admin/v_app',
            'app' => $this->ModelApp->allData(),
        ];
        
        return view('v_back_end', $data);
    }

    public function insert()
    {
        // Validasi input
        if (!$this->validate($this->appInsertRules, $this->appInsertMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama_app' => $this->request->getPost('nama_app'),
            'link_app' => $this->request->getPost('link_app'),
        ];

        $this->ModelApp->insertData($data);
        Session()->setFlashdata('insert', 'App Berhasil Ditambahkan !');

        return redirect()->to('Admin/App');
    }

    public function update($id_user)
    {
        // Validasi input
        if (!$this->validate($this->appUpdateRules, $this->appUpdateMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id_app'   => $id_user,
            'nama_app' => $this->request->getPost('nama_app'),
            'link_app' => $this->request->getPost('link_app'),
        ];

        $this->ModelApp->updateData($data);
        Session()->setFlashdata('update', 'App Berhasil Diupdate !');

        return redirect()->to('Admin/App');
    }

    public function delete($id_app)
    {
        $data = [
            'id_app' => $id_app,
        ];

        $this->ModelApp->deleteData($data);
        Session()->setFlashdata('delete', 'App Berhasil Dihapus !');

        return redirect()->to('Admin/App');
    }
}
