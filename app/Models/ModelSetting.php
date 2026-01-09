<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSetting extends Model
{
    public function DataKampus()
    {
        return $this->db->table('tbl_kampus')->where('id','1')->get()->getRowArray();
    }


    public function updateData($data)
    {
        $this->db->table('tbl_slider')->where('id_slider', $data['id_slider'])->update($data);
    }


}
