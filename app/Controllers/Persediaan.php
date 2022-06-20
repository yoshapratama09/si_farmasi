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
        $session = session();
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
        $session = session();
        $persediaan = $this->persediaanModel->findAll();
        $allData = $this->persediaanModel->getDataExp();

        $data = [
            'data' => $allData
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('Persediaan/top_data');
        echo view('Persediaan/penyesuaian_harga', $data);
        echo view('layout/footer');
    }

    public function getPHarga(){
        $session = session();
        
        $id = $this->request->getVar('medId');
        $filter = $this->request->getVar('filter');

        $allData = $this->persediaanModel->getDataExp();
        $medicine = $this->persediaanModel->findAll();
        
        
        if($filter == "1"){
            $name = $this->request->getVar('medName'); 
            $getSearch = $this->persediaanModel->getSearch($name);
            if(empty($getSearch)){
                $data = [
                    'data' => $allData,
                    'medicine' => $allData
                ];
                $session->setFlashData('msg', 'Obat tidak ditemukan');
            }else {
                $data = [
                    'data' => $getSearch,
                    'medicine' => $allData
                ];
            }
        }else {
            $getMedicine = $this->persediaanModel->getMedicine($id);
            if(empty($getMedicine)){
                $data = [
                    'data' => $allData,
                    'medicine' => $allData
                ];
                $session->setFlashData('msg', 'Obat tidak ditemukan');
            }else {
                $data = [
                    'data' => $getMedicine,
                    'medicine' => $allData
                ];
            }
        }

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('persediaan/top_data');
        echo view('persediaan/penyesuaian_harga', $data);
        echo view('layout/footer');
    }
    
    public function getDataExp(){
        $session = session();
        
        $id = $this->request->getVar('medId');
        $filter = $this->request->getVar('filter');

        $allData = $this->persediaanModel->getDataExp();
        $medicine = $this->persediaanModel->findAll();
        
        
        if($filter == "1"){
            $name = $this->request->getVar('medName'); 
            $getSearch = $this->persediaanModel->getSearch($name);
            if(empty($getSearch)){
                $data = [
                    'data' => $allData,
                    'medicine' => $allData
                ];
                // $session->setFlashData('msg', 'Obat tidak ditemukan');
            }else {
                $data = [
                    'data' => $getSearch,
                    'medicine' => $allData
                ];
            }
        }else {
            $getMedicine = $this->persediaanModel->getMedicine($id);
            if(empty($getMedicine)){
                $data = [
                    'data' => $allData,
                    'medicine' => $allData
                ];
                $session->setFlashData('msg', 'Obat tidak ditemukan');
            }else {
                $data = [
                    'data' => $getMedicine,
                    'medicine' => $allData
                ];
            }
        }

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('persediaan/top_data');
        echo view('persediaan/dataExp', $data);
        echo view('layout/footer');
    }

    public function dataExp(){
        $session = session();
        $persediaan = $this->persediaanModel->findAll();
        $allData = $this->persediaanModel->getDataExp();

        $data = [
            'data' => $allData,
            'medicine' => $allData
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('Persediaan/top_data');
        echo view('Persediaan/dataExp', $data);
        echo view('layout/footer');
    }

    public function penyesuaianStok(){
        $session = session();
        $persediaan = $this->persediaanModel->findAll();
        $allData = $this->persediaanModel->getDataExp();

        $data = [
            'data' => $allData
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('Persediaan/top_data');
        echo view('Persediaan/penyesuaian_stok', $data);
        echo view('layout/footer');
    }
}
