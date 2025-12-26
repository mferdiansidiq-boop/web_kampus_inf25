<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    public function allData()
    {
        return $this-db->table('tbl_user')->getResultArray();
    }
}