<?php

namespace App\Controllers;

use App\Models\PersediaanModel;

class Persediaan extends BaseController
{
    protected $persediaanModel;
    public function __construct()
    {
        $this->persediaanModel = new PersediaanModel();
    }
    
    public function index()
    {
        $persediaan = $this->persediaanModel->findAll();

        $data = [
            'data' => $persediaan
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('Persediaan/top_data');
        echo view('Persediaan/opname', $data);
        echo view('layout/footer');
    }

    public function penyesuaianHarga(){
        $persediaan = $this->persediaanModel->findAll();

        $data = [
            'data' => $persediaan
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('Persediaan/top_data');
        echo view('Persediaan/penyesuaian_harga', $data);
        echo view('layout/footer');
    }
    
    public function getDataExp(){
        $id = $this->request->getVar('medId');
        // $name 

        $medicine = $this->persediaanModel->findAll();
        $getMedicine = $this->persediaanModel->getMedicine($id);
        // $getSearch = $this->persediaanModel->getSearch();



        $data = [
            'data' => $getMedicine,
            'medicine' => $medicine
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('persediaan/top_data');
        echo view('persediaan/dataExp', $data);
        echo view('layout/footer');
    }

    public function dataExp(){
        $persediaan = $this->persediaanModel->findAll();

        $data = [
            'data' => $persediaan,
            'medicine' => $persediaan
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('Persediaan/top_data');
        echo view('Persediaan/dataExp', $data);
        echo view('layout/footer');
    }

    public function penyesuaianStok(){
        $persediaan = $this->persediaanModel->findAll();

        $data = [
            'data' => $persediaan
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('Persediaan/top_data');
        echo view('Persediaan/penyesuaian_stok', $data);
        echo view('layout/footer');
    }
}
