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
        $session = session();
        
        $id = $this->request->getVar('medId');
        $filter = $this->request->getVar('filter');
        $name = $this->request->getVar('medName'); 

        $medicine = $this->persediaanModel->findAll();
        
        if(empty($id)){
            
        }


        if($filter == "1"){
            $getSearch = $this->persediaanModel->getSearch($name);
            if(empty($getSearch)){
                $data = [
                    'data' => $medicine,
                    'medicine' => $medicine
                ];
                $session->setFlashData('msg', 'Obat tidak ditemukan');
            }else {
                $data = [
                    'data' => $getSearch,
                    'medicine' => $medicine
                ];
            }
        }else {
            $getMedicine = $this->persediaanModel->getMedicine($id);
            if(empty($getMedicine)){
                $data = [
                    'data' => $medicine,
                    'medicine' => $medicine
                ];
                $session->setFlashData('msg', 'Obat tidak ditemukan');
            }else {
                $data = [
                    'data' => $getMedicine,
                    'medicine' => $medicine
                ];
            }
        }

        // $data = [
        //     'data' => $getMedicine,
        //     'medicine' => $medicine
        // ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('persediaan/top_data');
        echo view('persediaan/dataExp', $data);
        echo view('layout/footer');
    }

    public function dataExp(){
        $session = session();
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
        $session = session();
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
