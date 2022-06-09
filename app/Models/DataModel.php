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
}
