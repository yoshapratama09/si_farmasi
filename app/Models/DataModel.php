<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModel extends Model
{
    protected $table      = 'supplier';
    protected $primaryKey = 'supplier_id';
    protected $allowedFields = ['supplier_name', 'supplier_address', 'supplier_phone', 'supplier_email', 'supplier_country'];
    protected $useTimestamps = true;

    // public function getSupplier(){
    //     $db = db_connect();
    //     $sql = "SELECT * FROM supplier";
    //     $query = $db->query($sql);
    //     $result = $query->getRow();     
    // }

    public function getSupName($name)
    {
        $query = $this->db->query("SELECT * FROM supplier where supplier_name ='$name'");

        $row = $query->getResultArray();

        return $row;
    }

    public function getSupNameById($id)
    {
        $query = $this->db->query("SELECT supplier_name FROM supplier where supplier_id =$id");

        $row = $query->getResultArray();

        return $row;
    }
}
