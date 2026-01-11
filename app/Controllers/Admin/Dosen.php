<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelDosen;

class Dosen extends BaseController
{
    protected $ModelDosen;
    public function __construct()
    {
        helper('form');
        $this->ModelDosen = new ModelDosen();
    }
    public function index()
    {
        $data = [
            'judul' => 'Dosen',
            'subjudul' => 'Dosen',
            'page' => 'Admin/dosen/v_index',
            'dosen' => $this->ModelDosen->allData(),
        ];
        return view('v_admin_base', $data);
    }

    pu

    public function detail($id_dosen)
    {
        $data = [
            'judul' => 'Dosen',
            'subjudul' => 'Detail Dosen',
            'page' => 'Admin/dosen/v_detail',
            'dosen' => $this->ModelDosen->detailData($id_dosen),
        ];
        return view('v_admin_base', $data);
    }

    public function delete($id_dosen)
    {
        $dosen = $this->ModelDosen->detailData($id_dosen);
        if ($dosen['foto_dosen'] != null) {
            unlink('foto/dosen/' . $dosen['foto_dosen']);
        }
        $this->ModelDosen->deleteData($id_dosen);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus !!!');
        return redirect()->to(base_url('admin/dosen'));
    }
}
