<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelFeedback;

class Feedback extends BaseController
{
    protected $ModelFeedback;
    public function __construct()
    {
        helper('form');
        $this->ModelFeedback = new ModelFeedback();
    }

    public function index()
    {
        $feedbackData = $this->ModelFeedback->findAll();

        $data = [
            'judul' => 'Data Feedback',
            'subjudul' => 'Daftar Feedback',
            'menu' => 'feedback',
            'submenu' => 'feedback',
            'page' => 'admin/feedback/v_index',
            'feedback' => $feedbackData ? $feedbackData : [],
        ];

        return view('v_back_end', $data);
    }

    // STORE - Simpan slider baru ke database
    public function store()
    {
        // VALIDASI INPUT
        $rules = [
            'nama'          => 'required|min_length[3]|max_length[100]',
            'jenis_kelamin' => 'required',
            'keluhan'       => 'required|min_length[5]',
            'alamat'        => 'required',
            'provinsi'      => 'required',
            'kabupaten'     => 'required',
            'kecamatan'     => 'required',
            'desa'          => 'required',
            'keterangan'    => 'required',
            'foto'          => 'uploaded[foto]|is_image[foto]|max_size[foto,5120]'
        ];

        $messages = [
            'nama' => [
                'required'   => 'Nama wajib diisi',
                'min_length' => 'Nama minimal 3 karakter',
            ],
            'jenis_kelamin' => [
                'required' => 'Jenis kelamin wajib dipilih',
            ],
            'keluhan' => [
                'required' => 'Keluhan wajib diisi',
            ],
            'alamat' => [
                'required' => 'Alamat wajib diisi',
            ],
            'provinsi' => [
                'required' => 'Provinsi wajib dipilih',
            ],
            'kabupaten' => [
                'required' => 'Kabupaten wajib dipilih',
            ],
            'kecamatan' => [
                'required' => 'Kecamatan wajib dipilih',
            ],
            'desa' => [
                'required' => 'Desa wajib dipilih',
            ],
            'keterangan' => [
                'required' => 'Keterangan wajib diisi',
            ],
            'foto' => [
                'uploaded' => 'Foto wajib diunggah',
                'is_image' => 'File harus berupa gambar',
                'max_size' => 'Ukuran gambar maksimal 5MB',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with(
                'validation_errors',
                $this->validator->getErrors()
            );
        }

        // HANDLE UPLOAD FOTO
        $file = $this->request->getFile('foto');
        $fileName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/uploads/feedback/', $fileName);

        // DATA UNTUK DATABASE
        $data = [
            'nama'          => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'keluhan'       => $this->request->getPost('keluhan'),
            'alamat'        => $this->request->getPost('alamat'),
            'provinsi'      => $this->request->getPost('provinsi'),
            'kabupaten'     => $this->request->getPost('kabupaten'),
            'kecamatan'     => $this->request->getPost('kecamatan'),
            'desa'          => $this->request->getPost('desa'),
            'keterangan'    => $this->request->getPost('keterangan'),
            'foto'          => $fileName,
        ];

        // SIMPAN KE DATABASE
        $this->ModelFeedback->insert($data);

        return redirect()->to(base_url('feedback'))
            ->with('success', 'Feedback berhasil dikirim. Terima kasih!');
    }


    // EDIT - Form edit slider
    public function edit($id_slider)
    {
        $sliderData = $this->ModelFeedback->getDataById($id_slider);

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
        $sliderData = $this->ModelFeedback->getDataById($id_slider);

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

        $this->ModelFeedback->updateData($dataUpdate);

        return redirect()->to(base_url('admin/slider'))
            ->with('insert', 'Data slider berhasil diupdate!');
    }

    // DELETE - Hapus slider dari database
    public function delete($id_slider)
    {
        $sliderData = $this->ModelFeedback->getDataById($id_slider);

        if (!$sliderData) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data slider tidak ditemukan');
        }

        // Hapus file gambar
        $filePath = ROOTPATH . 'public/uploads/slider/' . $sliderData['gambar_slider'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Hapus data dari database
        $this->ModelFeedback->deleteData(['id_slider' => $id_slider]);

        return redirect()->to(base_url('admin/slider'))
            ->with('delete', 'Data slider berhasil dihapus!');
    }
}
