<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSetting extends Model
{
    protected $table = 'tbl_kampus';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'logo_header',
        'nama_kampus',
        'logo_kampus',
        'alamat',
        'operasional',
        'no_telp',
        'email',
        'instagram',
        'facebook',
        'twiter',
        'linkedin',
        'youtube',
        'foto_pimpinan',
        'nama_pimpinan',
        'dipimpin_oleh',
        'sambutan',
        
    ];

    public function DataKampus()
    {
        return $this->db->table('tbl_kampus')->where('id','1')->get()->getRowArray();
    }


    public function updateData($data)
    {
        $this->db->table('tbl_slider')->where('id_slider', $data['id_slider'])->update($data);
    }


}
