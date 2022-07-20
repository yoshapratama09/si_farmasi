<?php

namespace App\Models;

use CodeIgniter\Model;

class MedicineModel extends Model
{
    protected $table      = 'medicine';
    protected $primaryKey = 'medicine_id';
    protected $allowedFields = ['medicine_id', 'medicine_name', 'supplier_id', 'medicine_stock', 'medicine_satuan1', 'medicine_satuan2', 'medicine_satuantotal', 'medicine_price', 'medicine_type', 'medicine_type', 'medicine_category', 'medicine_comp', 'medicine_func'];

    protected $table1      = 'categoryMed';
    protected $primaryKey1 = 'category_id';
    protected $allowedFields1 = ['category_id', 'category_name'];

    protected $table2      = 'typemed';
    protected $primaryKey2 = 'type_id';
    protected $allowedFields2 = ['type_id', 'type_name'];

    protected $table3      = 'satuanmed';
    protected $primaryKey3 = 'satuan_id';
    protected $allowedFields3 = ['satuan_id', 'satuan_name'];


    public function getDaftarObat()
    {
        $query = $this->db->query("SELECT * FROM medicine as med JOIN stockmed AS sm ON med.medicine_id = sm.medicine_id WHERE sm.stock_status=1 ORDER BY med.medicine_id");

        $row = $query->getResultArray();

        return $row;
    }

    public function getCountDaftarObat()
    {
        $query = $this->db->query("SELECT * FROM medicine as med JOIN stockmed AS sm ON med.medicine_id = sm.medicine_id WHERE sm.stock_status=1");

        $row = $query->getNumRows();

        return $row;
    }

    public function getKategori()
    {
        $query = $this->db->query("SELECT * FROM categoryMed");

        $row = $query->getResultArray();

        return $row;
    }

    public function getKategoriUpdate($id)
    {
        $query = $this->db->query("SELECT * FROM categoryMed where category_id =$id");

        $row = $query->getResultArray();

        return $row;
    }

    public function cekKategoriObat($id)
    {
        $query = $this->db->query("SELECT * FROM categorymed WHERE category_id = $id");

        $row = $query->getNumRows();

        return $row;
    }

    public function getType()
    {
        $query = $this->db->query("SELECT * FROM typemed");

        $row = $query->getResultArray();

        return $row;
    }

    public function cekTipeObat($id)
    {
        $query = $this->db->query("SELECT * FROM typemed WHERE type_id = $id");

        $row = $query->getNumRows();

        return $row;
    }

    public function getTipeUpdate($id)
    {
        $query = $this->db->query("SELECT * FROM typemed where type_id =$id");

        $row = $query->getResultArray();

        return $row;
    }

    public function getSatuan()
    {
        $query = $this->db->query("SELECT * FROM satuanmed");

        $row = $query->getResultArray();

        return $row;
    }

    public function cekSatuanObat($id)
    {
        $query = $this->db->query("SELECT * FROM satuanmed WHERE satuan_id = $id");

        $row = $query->getNumRows();

        return $row;
    }

    public function getSatuanUpdate($id)
    {
        $query = $this->db->query("SELECT * FROM satuanmed where satuan_id =$id");

        $row = $query->getResultArray();

        return $row;
    }

    public function cekObat($id)
    {
        $query = $this->db->query("SELECT * FROM medicine WHERE medicine_id = $id");

        $row = $query->getNumRows();

        return $row;
    }

    public function getObatUpd($id)
    {
        $query = $this->db->query("SELECT * FROM medicine WHERE medicine_id = $id");

        $row = $query->getResultArray();

        return $row;
    }


    public function searchObat($nama)
    {
        $query = $this->db->query("SELECT * FROM medicine as med JOIN stockmed AS sm ON med.medicine_id = sm.medicine_id WHERE sm.stock_status=1 AND med.medicine_name LIKE '%$nama%'");

        $row = $query->getResultArray();

        return $row;
    }

    public function searchKategoriObat($nama)
    {
        $query = $this->db->query("SELECT * FROM categorymed where category_name like '%$nama%'");

        $row = $query->getResultArray();

        return $row;
    }

    public function searchTipeObat($nama)
    {
        $query = $this->db->query("SELECT * FROM typemed where type_name like '%$nama%'");

        $row = $query->getResultArray();

        return $row;
    }

    public function searchSatuanObat($nama)
    {
        $query = $this->db->query("SELECT * FROM satuanmed where satuan_name like '%$nama%'");

        $row = $query->getResultArray();

        return $row;
    }

    public function getCountMed()
    {
        $query = $this->db->query("SELECT * FROM medicine");

        $row = $query->getNumRows();

        return $row;
    }

    public function getCountCategory()
    {
        $query = $this->db->query("SELECT * FROM categorymed");

        $row = $query->getNumRows();

        return $row;
    }

    public function getCountType()
    {
        $query = $this->db->query("SELECT * FROM typemed");

        $row = $query->getNumRows();

        return $row;
    }
}
