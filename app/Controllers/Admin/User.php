<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class User extends BaseController
{
    protected $ModelUser;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        $data = [
            'judul' => 'User',
            'subjudul' => 'User',
            'menu' => 'user',
            'submenu' => 'user',
            'page' => 'admin/v_user',
            'user' => $this->ModelUser->allData(),
        ];
        
        return view('v_back_end', $data);
    }

    public function insert()
    {
        $data = [
            'nama_user' => $this->request->getpost('nama_user'),
            'username' => $this->request->getpost('username'),
            'password' => sha1($this->request->getpost('password')),
            'level' => $this->request->getpost('level'),
        ];

        $this->ModelUser->insertData($data);
        Session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !');

        return redirect()->to('Admin/User');
    }

    public function update($id_user)
    {
        $data = [
            'id_user' => $id_user,
            'nama_user' => $this->request->getpost('nama_user'),
            'username' => $this->request->getpost('username'),
            'level' => $this->request->getpost('level'),
        ];

        $this->ModelUser->updateData($data);
        Session()->setFlashdata('update', 'Data Berhasil Diupdate !');

        return redirect()->to('Admin/User');
    }

    public function updatePassword($id_user)
    {
        $data = [
            'id_user' => $id_user,
            'password' => sha1($this->request->getpost('password')),
        ];

        $this->ModelUser->updateData($data);
        Session()->setFlashdata('update', 'Password Berhasil Diganti !');

        return redirect()->to('Admin/User');
    }

    public function delete($id_user)
    {
        $data = [
            'id_user' => $id_user,
        ];

        $this->ModelUser->deleteData($data);
        Session()->setFlashdata('delete', 'Data Berhasil Dihapus !');

        return redirect()->to('Admin/User');
    }
}
