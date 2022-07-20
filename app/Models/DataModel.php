<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModel extends Model
{
    protected $table      = 'supplier';
    protected $primaryKey = 'supplier_id';
    protected $allowedFields = ['supplier_id', 'supplier_name', 'supplier_address', 'supplier_phone', 'supplier_email', 'supplier_country'];
    protected $useTimestamps = true;

    protected $table1      = 'dokter';
    protected $primaryKey1 = 'dokter_id';
    protected $allowedFields1 = ['dokter_id', 'dokter_nama', 'dokter_alamat', 'dokter_kontak', 'jabatan', 'status_update'];
    protected $useTimestamps1 = true;

    protected $table2      = 'pasien';
    protected $primaryKey2 = 'pasien_id';
    protected $allowedFields2 = ['pasien_id', 'pasien_nama', 'pasien_dob', 'pasien_gender', 'pasien_address', 'pasien_phone'];
    protected $useTimestamps2 = true;

    protected $table3      = 'rumahsakit';
    protected $primaryKey3 = 'no_RS';
    protected $allowedFields3 = ['no_RS', 'nama_RS', 'alamat_RS', 'kategori_RS', 'kontak_RS'];
    protected $useTimestamps3 = true;

    function supplier()
    {
        $query = $this->db->query("SELECT * FROM supplier");

        $row = $query->getResultArray();

        return $row;
    }

    function pasien()
    {
        $query = $this->db->query("SELECT * FROM pasien");

        $row = $query->getResultArray();

        return $row;
    }

    function dokter()
    {
        $query = $this->db->query("SELECT * FROM dokter");
        $row = $query->getResultArray();

        return $row;
    }
    function searchDokter($nama)
    {
        $query = $this->db->query("SELECT * FROM dokter where dokter_nama LIKE '%$nama%'");
        $row = $query->getResultArray();
        return $row;
    }

    function sales()
    {
        $query = $this->db->query("SELECT * FROM sales");

        $row = $query->getResultArray();

        return $row;
    }

    function rumahsakit()
    {
        $query = $this->db->query("SELECT * FROM rumahsakit");

        $row = $query->getResultArray();

        return $row;
    }
    public function cekSup($id)
    {
        $query = $this->db->query("SELECT * FROM supplier WHERE supplier_id = $id");

        $row = $query->getNumRows();

        return $row;
    }
    function asuransi()
    {
        $query = $this->db->query("SELECT * FROM asuransi");

        $row = $query->getResultArray();

        return $row;
    }

    function employee()
    {
        $query = $this->db->query("SELECT * FROM employee");

        $row = $query->getResultArray();

        return $row;
    }
}
