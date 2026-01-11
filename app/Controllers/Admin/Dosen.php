<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelDosen;
use App\Models\ModelProdi;

class Dosen extends BaseController
{
    protected $ModelDosen;
    protected $modelProdi;
    public function __construct()
    {
        helper('form');
        $this->ModelDosen = new ModelDosen();
        $this->modelProdi = new ModelProdi();
    }
    public function index()
    {
        $data = [
            'judul' => 'Dosen',
            'subjudul' => 'Dosen',
            'menu' => 'dosen',
            'page' => 'Admin/dosen/v_index',
            'dosen' => $this->ModelDosen->allData(),
        ];
        return view('v_back_end', $data);
    }

    public function input()
    {
        $data = [
            'judul' => 'Input Dosen',
            'subjudul' => 'Input Dosen',
            'page' => 'Admin/dosen/v_input',
            'dosen' => $this->ModelDosen->allData(),
            'prodi' => $this->modelProdi->allData(),
        ];
        return view('v_back_end', $data);
    }

    public function insert()
    {
        // Validasi input dasar
        $rules = [
            'nama_dosen' => 'required|max_length[100]',
            'nip' => 'required|numeric',
            'pendidikan_terakhir' => 'required|max_length[100]',
            'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
            'email' => 'required|valid_email',
            'no_telp' => 'required|numeric',
            'alamat' => 'required',
            'id_prodi' => 'required|numeric',
            'foto' => 'is_image[foto]|max_size[foto,2048]',
        ];

        if (!$this->validate($rules)) {
            $errors = $this->validator->getErrors();
            session()->setFlashdata('validation_errors', $errors);
            return redirect()->to(base_url('admin/dosen/input'))->withInput();
        }

        // Unique checks for nip and email
        $nip = $this->request->getPost('nip');
        $email = $this->request->getPost('email');
        if ($this->ModelDosen->where('nip', $nip)->first()) {
            session()->setFlashdata('validation_errors', ['nip' => 'NIP sudah terdaftar']);
            return redirect()->to(base_url('admin/dosen/input'))->withInput();
        }
        if ($this->ModelDosen->where('email', $email)->first()) {
            session()->setFlashdata('validation_errors', ['email' => 'Email sudah terdaftar']);
            return redirect()->to(base_url('admin/dosen/input'))->withInput();
        }

        // Prepare data without foto first
        $data = [
            'nama_dosen' => $this->request->getPost('nama_dosen'),
            'nip' => $nip,
            'pendidikan_terakhir' => $this->request->getPost('pendidikan_terakhir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'email' => $email,
            'no_telp' => $this->request->getPost('no_telp'),
            'alamat' => $this->request->getPost('alamat'),
            'id_prodi' => $this->request->getPost('id_prodi'),
        ];

        // Insert data first
        $this->ModelDosen->insert($data);
        $dbError = $this->ModelDosen->db->error();
        if (!empty($dbError['code'])) {
            log_message('error', 'DB insert error: ' . $dbError['message']);
            session()->setFlashdata('validation_errors', ['db' => 'Terjadi kesalahan database: ' . $dbError['message']]);
            return redirect()->to(base_url('admin/dosen/input'))->withInput();
        }
        $insertId = $this->ModelDosen->getInsertID();

        // Then handle foto upload and update record if present
        $file = $this->request->getFile('foto');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            if (!is_dir(FCPATH . 'foto/dosen')) {
                mkdir(FCPATH . 'foto/dosen', 0755, true);
            }
            $fileName = $insertId . '_' . $file->getRandomName();
            if ($file->move(FCPATH . 'foto/dosen', $fileName)) {
                $this->ModelDosen->update($insertId, ['foto' => $fileName]);
            }
        }

        session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to(base_url('admin/dosen'));
    }

    public function detail($id_dosen)
    {
        $dosen = $this->ModelDosen->find($id_dosen);
        if (!$dosen) {
            return redirect()->to(base_url('admin/dosen'));
        }

        $data = [
            'judul' => 'Detail Dosen',
            'subjudul' => 'Detail Dosen',
            'menu' => 'dosen',
            'page' => 'Admin/dosen/v_detail',
            'dosen' => $dosen,
        ];
        return view('v_back_end', $data);
    }

    public function edit($id_dosen)
    {
        $dosen = $this->ModelDosen->find($id_dosen);
        if (!$dosen) {
            return redirect()->to(base_url('admin/dosen'));
        }

        $data = [
            'judul' => 'Edit Dosen',
            'subjudul' => 'Edit Dosen',
            'page' => 'Admin/dosen/v_edit',
            'dosen' => $dosen,
            'prodi' => $this->modelProdi->allData(),
        ];
        return view('v_back_end', $data);
    }

    public function update($id_dosen)
    {
        $dosen = $this->ModelDosen->find($id_dosen);
        if (!$dosen) {
            return redirect()->to(base_url('admin/dosen'));
        }

        // Basic validation
        $rules = [
            'nama_dosen' => 'required|max_length[100]',
            'nip' => 'required|numeric',
            'pendidikan_terakhir' => 'required|max_length[100]',
            'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
            'email' => 'required|valid_email',
            'no_telp' => 'required|numeric',
            'alamat' => 'required',
            'id_prodi' => 'required|numeric',
            'foto' => 'is_image[foto]|max_size[foto,2048]',
        ];

        if (!$this->validate($rules)) {
            $errors = $this->validator->getErrors();
            session()->setFlashdata('validation_errors', $errors);
            return redirect()->back()->withInput();
        }

        $nip = $this->request->getPost('nip');
        $email = $this->request->getPost('email');

        // If nip changed, ensure unique
        $exists = $this->ModelDosen->where('nip', $nip)->where('id_dosen !=', $id_dosen)->first();
        if ($exists) {
            session()->setFlashdata('validation_errors', ['nip' => 'NIP sudah terdaftar']);
            return redirect()->back()->withInput();
        }
        $existsEmail = $this->ModelDosen->where('email', $email)->where('id_dosen !=', $id_dosen)->first();
        if ($existsEmail) {
            session()->setFlashdata('validation_errors', ['email' => 'Email sudah terdaftar']);
            return redirect()->back()->withInput();
        }

        // Save textual fields first (without foto)
        $updateData = [
            'nama_dosen' => $this->request->getPost('nama_dosen'),
            'nip' => $nip,
            'pendidikan_terakhir' => $this->request->getPost('pendidikan_terakhir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'email' => $email,
            'no_telp' => $this->request->getPost('no_telp'),
            'alamat' => $this->request->getPost('alamat'),
            'id_prodi' => $this->request->getPost('id_prodi'),
        ];

        log_message('info', 'Update data for id_dosen ' . $id_dosen . ': ' . json_encode($updateData));
        $this->ModelDosen->skipValidation(true);
        $result = $this->ModelDosen->update($id_dosen, $updateData);
        $this->ModelDosen->skipValidation(false);
        log_message('info', 'Update result: ' . ($result ? 'success' : 'failed'));
        $dbError = $this->ModelDosen->db->error();
        if (!empty($dbError['code'])) {
            log_message('error', 'DB update error: ' . $dbError['message']);
        }

        // Then handle foto upload and update foto if provided
        $file = $this->request->getFile('foto');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            if (!is_dir(FCPATH . 'foto/dosen')) {
                mkdir(FCPATH . 'foto/dosen', 0755, true);
            }
            // remove old file
            if (!empty($dosen['foto']) && file_exists(FCPATH . 'foto/dosen/' . $dosen['foto'])) {
                @unlink(FCPATH . 'foto/dosen/' . $dosen['foto']);
            }
            $fileName = $id_dosen . '_' . $file->getRandomName();
            if ($file->move(FCPATH . 'foto/dosen', $fileName)) {
                $this->ModelDosen->update($id_dosen, ['foto' => $fileName]);
            }
        }

        session()->setFlashdata('update', 'Data Berhasil Diupdate !!!');
        return redirect()->to(base_url('admin/dosen'));
    }

    public function delete($id_dosen)
    {
        $dosen = $this->ModelDosen->find($id_dosen);
        if ($dosen && !empty($dosen['foto'])) {
            $file = FCPATH . 'foto/dosen/' . $dosen['foto'];
            if (file_exists($file)) {
                @unlink($file);
            }
        }
        $this->ModelDosen->delete($id_dosen);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus !!!');
        return redirect()->to(base_url('admin/dosen'));
    }
}
