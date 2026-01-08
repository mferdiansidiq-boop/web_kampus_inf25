<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_user')->get()->getResultArray();
    }

    public function insertData($data)
    {
        $this->db->table('tbl_user')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('tbl_user')->where('id_user', $data['id_user'])->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('tbl_user')->where('id_user', $data['id_user'])->delete($data);
    }
}
