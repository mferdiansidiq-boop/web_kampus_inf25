<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelFeedback;

class FeedbackPublic extends BaseController
{
    protected $ModelFeedback;

    public function __construct()
    {
        helper('form');
        $this->ModelFeedback = new ModelFeedback();
    }

    // SUBMIT TANPA LOGIN
    public function store()
    {
        $rules = [
            'nama'          => 'required|min_length[3]',
            'jenis_kelamin' => 'required',
            'keluhan'       => 'required',
            'alamat'        => 'required',
            'provinsi'      => 'required',
            'kabupaten'     => 'required',
            'kecamatan'     => 'required',
            'desa'          => 'required',
            'keterangan'    => 'required',
            'foto'          => 'uploaded[foto]|is_image[foto]|max_size[foto,5120]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with(
                'validation_errors',
                $this->validator->getErrors()
            );
        }

        $file = $this->request->getFile('foto');
        $fileName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/uploads/feedback/', $fileName);

        $this->ModelFeedback->insert([
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
        ]);

        return redirect()->back()
            ->with('success', 'Feedback berhasil dikirim');
    }
}
