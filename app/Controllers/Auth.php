<?php

namespace App\Controllers;
use App\Models\ModelAuth;

class Auth extends BaseController
{
    protected $ModelAuth;

    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
    }

    public function login()
    {
        return view('v_login');
    }

    public function cekLogin()
    {
        if ($this->validate([
                'username' => [
                    'label' => 'E-Mail', 
                    'rules' => 'required', 
                    'errors' => [
                        'required' => '{field} Wajib Diisi !!'
                    ]
                ],
                'password' => [
                    'label' => 'Password', 
                    'rules' => 'required', 
                    'errors' => [
                        'required' => '{field} Wajib Diisi !!'
                    ]
                ],
        ])) {
            $username = $this->request->getPost('username');
            $password = sha1($this->request->getPost('password'));

            $cekLogin = $this->ModelAuth->loginUser($username, $password);
            if ($cekLogin) {
                // jika login berhasil
                session()->set('id_user', $cekLogin['id_user']);
                session()->set('level', $cekLogin['level']);
                session()->set('nama_user', $cekLogin['nama_user']);
                return redirect()->to('Admin/Dashboard');
            } else {
                //jika gagal login
                session()->setFlashdata('gagal', 'Username atau Password salah');
                return redirect()->to('Auth/login');
            }
        } else {
            //jika valid
            return redirect()->to('Auth/login')->withInput();
        }
    }

    public function logout()
    {
        session()->remove('id_user');
        session()->remove('level');
        session()->remove('nama_user');
        session()->setFlashdata('berhasil', 'Anda berhasil Log Out');
        return redirect()->to('Auth/login');
    }
}
