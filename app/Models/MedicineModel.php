<?php

namespace App\Models;

use CodeIgniter\Model;

class MedicineModel extends Model
{
    protected $table      = 'medicine';
    protected $primaryKey = 'medicine_id';
    protected $allowedFields = ['medicine_id', 'medicine_name', 'medicine_stock', 'medicine_price'];

    protected $table1      = 'categoryMed';
    protected $primaryKey1 = 'category_id';
    protected $allowedFields1 = ['category_id', 'category_name'];

    protected $table2      = 'typemed';
    protected $primaryKey2 = 'type_id';
    protected $allowedFields2 = ['type_id', 'type_name'];

    protected $table3      = 'satuanmed';
    protected $primaryKey3 = 'satuan_id';
    protected $allowedFields3 = ['satuan_id', 'satuan_name'];


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

    // public function updateObat($id, $nama, $stok, $harga)
    // {
    //     $query = $this->db->query("UPDATE medicine set medicine_name = $nama, medicine_stock = $stok, medicine_price=$harga WHERE medicine_id = $id");

    //     $row = $query->getRow();

    //     return $row;
    // }

    public function searchObat($nama)
    {
        $query = $this->db->query("SELECT * FROM medicine where medicine_name like '%$nama%'");

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
}
