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
    protected $allowedFields2 = ['medicine_id', 'created_at', 'stock_qty', 'stock_status', 'stock_type', 'stock_exp', 'stock_mfd'];
    protected $useTimestamps2 = true;
    protected $createdField2  = 'created_at';

    protected $table3      = 'pricemed';
    protected $primaryKey3 = 'price_id';
    protected $allowedFields3 = ['medicine_id', 'price_amount', 'price_type', 'price_status', 'stock_invoice'];
    protected $useTimestamps3 = true;
    protected $createdField3  = 'created_at';

    protected $table4      = 'item';
    protected $primaryKey4 = 'item_id';
    protected $allowedFields4 = ['medicine_id', 'item_date', 'item_qty', 'item_price', 'item_type', 'item_invoice'];
    protected $useTimestamps4 = true;
    protected $createdField4  = 'created_at';

    protected $table5      = 'dataexp';
    protected $primaryKey5 = 'exp_id';
    protected $allowedFields5 = ['exp_id', 'exp_date', 'mfd_date', 'invoice_id', 'medicine_id', 'data_qty'];
    protected $useTimestamps5 = true;
    protected $createdField5  = 'created_at';

    public function getMedicine($id)
    {
        $query = $this->db->query("SELECT * FROM medicine as med JOIN stockmed as sm ON med.medicine_id = sm.medicine_id JOIN pricemed as pm ON med.medicine_id = pm.medicine_id WHERE med.medicine_id = $id AND stock_status = 1 AND price_status = 1 AND price_type = 1");

        $row = $query->getResultArray();

        return $row;
    }

    public function getMed($id)
    {
        $query = $this->db->query("SELECT * FROM medicine as med JOIN stockmed as sm ON med.medicine_id = sm.medicine_id WHERE med.medicine_id = '$id' AND sm.stock_status = 1");

        $row = $query->getResultArray();

        return $row;
    }

    public function getSearch($nama)
    {
        $query = $this->db->query("SELECT * FROM medicine as med JOIN stockmed as sm ON med.medicine_id = sm.medicine_id WHERE med.medicine_name LIKE '%$nama%' AND sm.stock_status = 1");

        $row = $query->getResultArray();

        return $row;
    }

    public function getStock($id)
    {
        $query = $this->db->query("SELECT * FROM stockmed WHERE stock_id = $id AND stock_status = 1");

        $row = $query->getResultArray();

        return $row;
    }

    public function getAll()
    {
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

    public function cekChildMedHarga($id)
    {
        $query = $this->db->query("SELECT * FROM pricemed WHERE medicine_id = $id");

        $row = $query->getNumRows();

        return $row;
    }

    public function cekChildMedStock($id)
    {
        $query = $this->db->query("SELECT * FROM stockmed WHERE medicine_id = $id");

        $row = $query->getNumRows();

        return $row;
    }

    public function getIdPstock()
    {
        $query = $this->db->query("SELECT * FROM stockmed WHERE stock_invoice = (SELECT MAX(stock_invoice) FROM stockmed WHERE stock_type = 'P')");

        $row = $query->getResultArray();

        return $row;
    }

    public function itemIn()
    {
        $query = $this->db->query("SELECT * FROM item as itm JOIN medicine as med ON med.medicine_id = itm.medicine_id WHERE item_type = 1");

        $row = $query->getResultArray();

        return $row;
    }

    public function itemOut()
    {
        $query = $this->db->query("SELECT * FROM item as itm JOIN medicine as med ON med.medicine_id = itm.medicine_id WHERE item_type = 0");

        $row = $query->getResultArray();

        return $row;
    }

    public function getItemIn($id)
    {
        $query = $this->db->query("SELECT * FROM item as itm JOIN medicine as med ON med.medicine_id = itm.medicine_id WHERE itm.medicine_id = $id AND item_type = 1");

        $row = $query->getResultArray();

        return $row;
    }

    public function getItemOut($id)
    {
        $query = $this->db->query("SELECT * FROM item as itm JOIN medicine as med ON med.medicine_id = itm.medicine_id WHERE itm.medicine_id = $id AND item_type = 0");

        $row = $query->getResultArray();

        return $row;
    }

    public function getSearchIn($name)
    {
        $query = $this->db->query("SELECT * FROM item as itm JOIN medicine as med ON med.medicine_id = itm.medicine_id WHERE itm.medicine_id LIKE '%$name%' AND item_type = 1");

        $row = $query->getResultArray();

        return $row;
    }

    public function getSearchOut($name)
    {
        $query = $this->db->query("SELECT * FROM item as itm JOIN medicine as med ON med.medicine_id = itm.medicine_id WHERE itm.medicine_id LIKE '%$name%' AND item_type = 0");

        $row = $query->getResultArray();

        return $row;
    }

    public function getOpname($id)
    {
        $query = $this->db->query("SELECT * FROM stockmed as sm JOIN medicine as med ON med.medicine_id = sm.medicine_id JOIN item AS itm ON sm.medicine_id = itm.medicine_id WHERE med.medicine_id = $id GROUP BY stock_id");

        $row = $query->getResultArray();

        return $row;
    }

    public function getSearchOp($name)
    {
        $query = $this->db->query("SELECT * FROM stockmed as sm JOIN medicine as med ON med.medicine_id = sm.medicine_id JOIN item AS itm ON sm.medicine_id = itm.medicine_id WHERE med.medicine_id LIKE '%$name%'");

        $row = $query->getResultArray();

        return $row;
    }

    public function getHarga($id)
    {
        $query = $this->db->query("SELECT * FROM pricemed WHERE medicine_id LIKE '$id'");

        $row = $query->getResultArray();

        return $row;
    }

    public function getStockMed($id)
    {
        $query = $this->db->query("SELECT * FROM medicine as med JOIN stockmed as sm ON med.medicine_id = sm.medicine_id WHERE sm.medicine_id = '$id'");

        $row = $query->getResultArray();

        return $row;
    }

    public function getCountItemIn()
    {
        $query = $this->db->query("SELECT SUM(item_qty) FROM item WHERE item_type = 1 AND MONTH(item_date) = MONTH(CURDATE())");

        $row = $query->getRow();

        return $row;
    }

    public function getCountItemOut()
    {
        $query = $this->db->query("SELECT SUM(item_qty) FROM item WHERE item_type = 0 AND MONTH(item_date) = MONTH(CURDATE())");

        $row = $query->getRow();

        return $row;
    }

    public function getCountExp()
    {
        $query = $this->db->query("SELECT * FROM stockmed WHERE stock_exp < CURDATE() AND stock_status = 1");

        $row = $query->getNumRows();

        return $row;
    }

    public function getPriceId($id)
    {
        $query = $this->db->query("SELECT price_id FROM pricemed WHERE medicine_id = '$id' AND price_type = 1");

        $row = $query->getResultArray();

        return $row;
    }

    public function get($where = null, $page = null, $like=null){
        $builder = $this->db->table('medicine m');
        $builder->select('*');
        if($page == 'dataExp'){
            $builder->join('dataexp e', 'm.medicine_id = e.medicine_id');
            if(!empty($where)){
                $query = $builder->where($where)->orderBy('e.exp_date', 'ASC')->get();
            }else if (!empty($like)){
                $query = $builder->like('medicine_name', $like)->orderBy('e.exp_date', 'DESC')->get();
            }else{
                $query = $builder->orderBy('e.exp_date', 'ASC')->get();
            }
        }else if($page == 'stok'){

        }else{
            $builder->join('stockmed s', 'm.medicine_id = s.medicine_id');
            $query = $builder->where('stock_status', 1)->get();
        }
        
        return $query->getResultArray();
    }
}
