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


    public function getKategori()
    {
        $query = $this->db->query("SELECT * FROM categoryMed");

        $row = $query->getResultArray();

        return $row;
    }

    public function getType()
    {
        $query = $this->db->query("SELECT * FROM typemed");

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
}
