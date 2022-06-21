<?php

namespace App\Models;

use CodeIgniter\Model;

class PersediaanModel extends Model
{
    protected $table      = 'medicine';
    protected $primaryKey = 'medicine_id';
    protected $allowedFields = ['medicine_id', 'medicine_name', 'medicine_stock', 'medicine_price'];
    protected $useTimestamps = true;

    protected $table1      = 'pricemed';
    protected $primaryKey1 = 'price_id';
    protected $allowedFields1 = ['medicine_id', 'price_sales', 'price_capital', 'sales_status', 'capital_status', 'update_date'];
    protected $useTimestamps1 = true;
    protected $createdField1  = 'update_date';

    protected $table2      = 'stockmed';
    protected $primaryKey2 = 'stock_id';
    protected $allowedFields2 = ['medicine_id', 'created_at', 'stock_qty', 'stock_status'];
    protected $useTimestamps2 = true;
    protected $createdField2  = 'created_at';


    public function getMedicine($id)
    {
        $query = $this->db->query("SELECT * FROM medicine as med JOIN stockmed as sm ON med.medicine_id = sm.medicine_id JOIN pricemed as pm ON med.medicine_id = pm.medicine_id WHERE med.medicine_id = $id");

        $row = $query->getResultArray();

        return $row;
    }


    public function getSearch($nama)
    {
        $query = $this->db->query("SELECT * FROM medicine as med JOIN stockmed as sm ON med.medicine_id = sm.medicine_id WHERE med.medicine_name LIKE '%$nama%'");

        $row = $query->getResultArray();

        return $row;
    }

    public function getPHarga($id)
    {
        $query = $this->db->query("SELECT * FROM medicine WHERE medicine_id = $id");

        $row = $query->getResultArray();

        return $row;
    }

    public function getJoinHarga()
    {
        $query = $this->db->query("SELECT * FROM medicine as med JOIN pricemed as pm ON med.medicine_id = pm.medicine_id");

        $row = $query->getResultArray();

        return $row;
    }

    public function getDataExp()
    {
        $query = $this->db->query("SELECT * FROM medicine as med JOIN stockmed as sm ON med.medicine_id = sm.medicine_id ORDER BY medicine_exp DESC");

        $row = $query->getResultArray();

        return $row;
    }

    public function getAll(){
        $query = $this->db->query("SELECT * FROM medicine as med JOIN pricemed as pm ON med.medicine_id = pm.medicine_id JOIN stockmed as sm ON med.medicine_id = sm.medicine_id");

        $row = $query->getResultArray();

        return $row;
    }
    // public function getJoinStock()
    // {
    //     $query = $this->db->query("SELECT * FROM medicine as med JOIN pricemed as pm ON med.medicine_id = pm.medicine_id");

    //     $row = $query->getResultArray();

    //     return $row;
    // }
}
