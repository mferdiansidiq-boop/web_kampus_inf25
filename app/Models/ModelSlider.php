<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSlider extends Model
{
    protected $table = 'tbl_slider';
    protected $primaryKey = 'id_slider';
    protected $allowedFields = ['judul_slider', 'url_terkait', 'gambar_slider'];

    public function allData()
    {
        return $this->db->table('tbl_slider')->get()->getResultArray();
    }

    public function getDataById($id)
    {
        return $this->db->table('tbl_slider')
                        ->where('id_slider', $id)
                        ->get()
                        ->getRowArray();
    }

    public function insertData($data)
    {
        $this->db->table('tbl_slider')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('tbl_slider')->where('id_slider', $data['id_slider'])->update($data);
    }

    public function deleteData($where)
    {
        $this->db->table('tbl_slider')->where($where)->delete();
    }
}
