<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProdi extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_prodi')->get()->getResultArray();
    }

    public function getDataById($id_prodi)
    {
        return $this->db->table('tbl_prodi')
                        ->where('id_prodi', $id_prodi)
                        ->get()
                        ->getRowArray();
    }

    public function insertData($data)
    {
        $this->db->table('tbl_prodi')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('tbl_prodi')->where('id_prodi', $data['id_prodi'])->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('tbl_prodi')->where('id_prodi', $data['id_prodi'])->delete($data);
    }
}
