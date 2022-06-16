<?php

namespace App\Models;

use CodeIgniter\Model;

class PersediaanModel extends Model
{
    protected $table      = 'medicine';
    protected $primaryKey = 'medicine_id';
    protected $allowedFields = ['medicine_id', 'medicine_name', 'medicine_stock', 'medicine_price'];
    protected $useTimestamps = true;

    public function getMedicine()
    {
        $query = $this->db->query("SELECT * FROM medicine");

        $row = $query->getResultArray();

        return $row;
    }

}
