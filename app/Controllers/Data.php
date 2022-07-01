<?php

namespace App\Controllers;

use App\Models\DataModel;

class Data extends BaseController
{

    protected $dataModel;
    public function __construct()
    {
        $this->dataModel = new DataModel();
    }
    public function index()
    {
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        }

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('data');
        echo view('layout/footer');
    }
    public function supplier()
    {
        $supplier = $this->dataModel->findAll();

        $data = [
            'data' => $supplier
        ];
        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('supplier', $data);
        echo view('layout/footer');
    }
    public function pasien()
    {
        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('pasien');
        echo view('layout/footer');
    }
    public function dokter()
    {
        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('dokter');
        echo view('layout/footer');
    }
    public function rumahsakit()
    {
        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('rumahsakit');
        echo view('layout/footer');
    }
    public function dokterspesialis()
    {
        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('dokterspesialis');
        echo view('layout/footer');
    }
    public function asuransi()
    {
        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('asuransi');
        echo view('layout/footer');
    }
    public function sales()
    {
        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('sales');
        echo view('layout/footer');
    }
}
