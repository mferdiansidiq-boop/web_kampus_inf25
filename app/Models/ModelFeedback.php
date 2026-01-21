<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelFeedback extends Model
{
    protected $table = 'tbl_feedback';
    protected $primaryKey = 'id_feedback';
    protected $allowedFields = ['nama', 'jenis_kelamin', 'keluhan', 'alamat', 'provinsi', 'kabupaten', 'kecamatan', 'desa', 'keterangan', 'foto'];

    public function allData()
    {
        return $this->db->table('tbl_feedback')->get()->getResultArray();
    }

    public function getDataByid_feedback($id_feedback)
    {
        return $this->db->table('tbl_feedback')
            ->where('id_feedback', $id_feedback)
            ->get()
            ->getRowArray();
    }

    public function insertData($data)
    {
        $this->db->table('tbl_feedback')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('tbl_feedback')->where('id_feedback', $data['id_feedback'])->update($data);
    }

    public function deleteData($where)
    {
        $this->db->table('tbl_feedback')->where($where)->delete();
    }
}
