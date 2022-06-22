<?php

namespace App\Models;

use CodeIgniter\Model;

class PersediaanModel extends Model
{
    protected $table      = 'medicine';
    protected $primaryKey = 'medicine_id';
    protected $allowedFields = ['medicine_id', 'medicine_name', 'medicine_stock', 'medicine_price'];
    protected $useTimestamps = true;

    protected $table2      = 'stockmed';
    protected $primaryKey2 = 'stock_id';
    protected $allowedFields2 = ['medicine_id', 'created_at', 'stock_qty', 'stock_status'];
    protected $useTimestamps2 = true;
    protected $createdField2  = 'created_at';

    protected $table3      = 'pricemed';
    protected $primaryKey3 = 'price_id';
    protected $allowedFields3 = ['medicine_id', 'price_amount', 'price_type', 'price_status'];
    protected $useTimestamps3 = true;
    protected $createdField3  = 'created_at';

    public function getMedicine($id)
    {
        $query = $this->db->query("SELECT * FROM medicine as med JOIN stockmed as sm ON med.medicine_id = sm.medicine_id JOIN pricemed as pm ON med.medicine_id = pm.medicine_id WHERE med.medicine_id = $id AND stock_status = 1 AND price_status = 1 AND price_type = 1");

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

    public function getStock($id)
    {
        $query = $this->db->query("SELECT * FROM stockmed WHERE stock_id = $id AND stock_status = 1");

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
        $query = $this->db->query("SELECT * FROM medicine as med JOIN stockmed as sm ON med.medicine_id = sm.medicine_id WHERE stock_status = 1 ORDER BY medicine_exp DESC");

        $row = $query->getResultArray();

        return $row;
    }

    public function getAll(){
        $query = $this->db->query("SELECT * FROM medicine as med JOIN pricemed as pm ON med.medicine_id = pm.medicine_id JOIN stockmed as sm ON med.medicine_id = sm.medicine_id WHERE pm.price_type = 1 AND pm.price_status = 1 AND sm.stock_status = 1");

        $row = $query->getResultArray();

        return $row;
    }

    public function getAllStock()
    {
        $query = $this->db->query("SELECT * FROM medicine as med JOIN stockmed as sm ON med.medicine_id = sm.medicine_id WHERE stock_status = 1");

        $row = $query->getResultArray();

        return $row;
    }

    public function getHarga1()
    {
        $query = $this->db->query("SELECT * FROM medicine as med JOIN pricemed as pm ON med.medicine_id = pm.medicine_id WHERE pm.price_type = 1 AND pm.price_status = 1");

        $row = $query->getResultArray();

        return $row;
    }


    public function getHarga2()
    {
        $query = $this->db->query("SELECT * FROM medicine as med JOIN pricemed as pm ON med.medicine_id = pm.medicine_id WHERE pm.price_type = 0 AND pm.price_status = 1");

        $row = $query->getResultArray();

        return $row;
    }
}
