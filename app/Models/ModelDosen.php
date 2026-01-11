<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDosen extends Model
{
    protected $table            = 'tbl_dosen';
    protected $primaryKey       = 'id_dosen';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_dosen',
        'nip',
        'foto',
        'pendidikan_terakhir',
        'jenis_kelamin',
        'email',
        'no_telp',
        'alamat',
        'id_prodi',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nama_dosen' => 'required|max_length[100]',
        'nip' => 'required|numeric|is_unique[tbl_dosen.nip]',
        'pendidikan_terakhir' => 'required|max_length[100]',
        'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
        'email' => 'required|valid_email|is_unique[tbl_dosen.email]',
        'no_telp' => 'required|numeric',
        'alamat' => 'required',
        'id_prodi' => 'required|numeric',
    ];
    protected $validationMessages   = [
        'nama_dosen' => [
            'required' => 'Nama Dosen harus diisi',
            'max_length' => 'Nama Dosen maksimal 100 karakter',
        ],
        'nip' => [
            'required' => 'NIP harus diisi',
            'numeric' => 'NIP harus berupa angka',
            'is_unique' => 'NIP sudah terdaftar',
        ],
        'pendidikan_terakhir' => [
            'required' => 'Pendidikan Terakhir harus diisi',
            'max_length' => 'Pendidikan Terakhir maksimal 100 karakter',
        ],
        'jenis_kelamin' => [
            'required' => 'Jenis Kelamin harus diisi',
            'in_list' => 'Jenis Kelamin tidak valid',
        ],
        'email' => [
            'required' => 'Email harus diisi',
            'valid_email' => 'Email tidak valid',
            'is_unique' => 'Email sudah terdaftar',
        ],
        'no_telp' => [
            'required' => 'No. Telp harus diisi',
            'numeric' => 'No. Telp harus berupa angka',
        ],
        'alamat' => [
            'required' => 'Alamat harus diisi',
        ],
        'id_prodi' => [
            'required' => 'Program Studi harus diisi',
            'numeric' => 'Program Studi tidak valid',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function allData()
    {
        return $this->db->table('tbl_dosen')
                        ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_dosen.id_prodi', 'left')
                        ->orderBy('tbl_dosen.id_dosen', 'ASC')
                        ->get()
                        ->getResultArray();
    }

    


}
