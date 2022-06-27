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

    public function getOpname(){
        $session = session();
        $persediaan = $this->persediaanModel->getAllStock();
        $allData = $this->persediaanModel->itemOut();

        $data = [
            'data' => $allData,
            'stock' => $persediaan
        ];

        $session->setFlashData('msg', 'Success');

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('Persediaan/top_data');
        echo view('Persediaan/opname', $data);
        echo view('layout/footer');
    }
}

    public function penyesuaianHarga(){
        $session = session();
        $allData = $this->persediaanModel->getAll();
        $getPSales = $this->persediaanModel->getHarga1();
        $getPCapital = $this->persediaanModel->getHarga2();

        $data = [
            'data' => $allData,
            'allData' => $allData, 
            'sales' => $getPSales,
            'capital' => $getPCapital
        ];

        $session->setFlashData('msg', 'Success');

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

        $allData = $this->persediaanModel->getAll();
        $getPSales = $this->persediaanModel->getHarga1();
        $getPCapital = $this->persediaanModel->getHarga2();
        
        
        if($filter == "1"){
            $name = $this->request->getVar('medName'); 
            $getSearch = $this->persediaanModel->getSearch($name);
            if(empty($getSearch)){
                $data = [
                    'data' => $allData,
                    'allData' => $allData,
                    'sales' => $getPSales,
                    'capital' => $getPCapital
                ];
                $session->setFlashData('msg', 'Obat tidak ditemukan');
            }else {
                $data = [
                    'data' => $getSearch,
                    'allData' => $allData,
                    'sales' => $getPSales,
                    'capital' => $getPCapital
                ];
                $session->setFlashData('msg', 'Success');
            }
        }else {
            $getMedicine = $this->persediaanModel->getMedicine($id);
            if(empty($getMedicine)){
                $data = [
                    'data' => $allData,
                    'allData' => $allData,
                    'sales' => $getPSales,
                    'capital' => $getPCapital
                ];
                $session->setFlashData('msg', 'Obat tidak ditemukan');
            }else {
                $data = [
                    'data' => $getMedicine,
                    'allData' => $allData,
                    'sales' => $getPSales,
                    'capital' => $getPCapital
                ];
                $session->setFlashData('msg', 'Success');
            }
        }

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('persediaan/top_data');
        echo view('persediaan/penyesuaian_harga', $data);
        echo view('layout/footer');
    }

    public function updateHarga(){
        $session = session();
        $array = array();
        $harga = $this->request->getVar('hargaB');
        $idObat = $this->request->getVar('idObat');
        $idPrice = $this->request->getVar('idPrice');

        $db = db_connect('default');
        $builder = $db->table('pricemed2');

        $index=0;
        foreach($idObat as $id){
            if($harga[$index] != null){
                array_push($array, array(
                    'medicine_id' => $id,
                    'price_amount' => $harga[$index],
                    'price_type' => 1,
                    'price_status' => 1
                ));
                $builder->set('price_status', '0');
                $builder->where('price_id', $idPrice[$index]);
                $builder->update();
            }
            $index++;
        }
        $builder = $db->table('pricemed2');
        $builder->insertBatch($array);
        $session->setFlashData('msg', 'Success');

        return redirect()->to(base_url('/persediaan/pHarga'));
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
                $session->setFlashData('msg', 'Obat tidak ditemukan');
            }else {
                $data = [
                    'data' => $getSearch,
                    'medicine' => $allData
                ];
                $session->setFlashData('msg', 'Success');
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
                $session->setFlashData('msg', 'Success');
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

        $session->setFlashData('msg', 'Success');

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('Persediaan/top_data');
        echo view('Persediaan/dataExp', $data);
        echo view('layout/footer');
    }

    public function penyesuaianStok(){
        $session = session();
        $persediaan = $this->persediaanModel->findAll();
        $allData = $this->persediaanModel->getAllStock();
        $invoice = $this->persediaanModel->getIdPstock();

        $data = [
            'data' => $allData,
            'allData' => $allData,
            'invoice' => $invoice
        ];

        $session->setFlashData('msg', 'Success');

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('Persediaan/top_data');
        echo view('Persediaan/penyesuaian_stok', $data);
        echo view('layout/footer');
    }

    public function getPStock(){
        $session = session();
        
        $id = $this->request->getVar('medId');
        $filter = $this->request->getVar('filter');

        $allData = $this->persediaanModel->getAllStock();
        $medicine = $this->persediaanModel->findAll();
        $invoice = $this->persediaanModel->getIdPstock();
        
        if($filter == "1"){
            $name = $this->request->getVar('medName'); 
            $getSearch = $this->persediaanModel->getSearch($name);
            if(empty($getSearch)){
                $data = [
                    'data' => $allData,
                    'allData' => $allData,
                    'invoice' => $invoice
                ];
                $session->setFlashData('msg', 'Obat tidak ditemukan');
            }else {
                $data = [
                    'data' => $getSearch,
                    'allData' => $allData,
                    'invoice' => $invoice
                ];
                $session->setFlashData('msg', 'Success');
            }
        }else {
            $getMedicine = $this->persediaanModel->getMedicine($id);
            if(empty($getMedicine)){
                $data = [
                    'data' => $allData,
                    'allData' => $allData,
                    'invoice' => $invoice
                ];
                $session->setFlashData('msg', 'Obat tidak ditemukan');
            }else {
                $data = [
                    'data' => $getMedicine,
                    'allData' => $allData,
                    'invoice' => $invoice
                ];
                $session->setFlashData('msg', 'Success');
            }
        }

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('persediaan/top_data');
        echo view('persediaan/penyesuaian_stok', $data);
        echo view('layout/footer');
    }

    public function updateStock(){
        $session = session();
        $array = array();
        $qty = $this->request->getVar('qtyBaru');
        $idObat = $this->request->getVar('idObat');
        $idStock = $this->request->getVar('idStock');
        $invoice = $this->request->getVar('idPs');

        $db = db_connect('default');
        $builder = $db->table('stockmed');

        $index=0;
        foreach($idObat as $id){
            if($qty[$index] != null){
                array_push($array, array(
                    'medicine_id' => $id,
                    'stock_qty' => $qty[$index],
                    'stock_status' => 1,
                    'stock_invoice' => $invoice
                ));
                $builder->set('stock_status', '0');
                $builder->where('stock_id', $idStock[$index]);
                $builder->update();
            }
            $index++;
        }

        $builder->insertBatch($array);
        $session->setFlashData('msg', 'Success');

        return redirect()->to(base_url('/persediaan/pStock'));
    }

    public function itemIn(){
        $session = session();
        $persediaan = $this->persediaanModel->getAllStock();
        $allData = $this->persediaanModel->itemIn();

        $data = [
            'data' => $allData,
            'stock' => $persediaan
        ];

        $session->setFlashData('msg', 'Success');

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('Persediaan/top_data');
        echo view('Persediaan/itemIn', $data);
        echo view('layout/footer');
    }

    public function getitemIn(){
        $session = session();
        $persediaan = $this->persediaanModel->getAllStock();
        $allData = $this->persediaanModel->itemIn();
        
        $id = $this->request->getVar('medId');
        $filter = $this->request->getVar('filter');

        if($filter == "1"){
            $name = $this->request->getVar('medName'); 
            $getSearchItem = $this->persediaanModel->getSearchIn($name);
            if(empty($getSearchItem)){
                $data = [
                    'data' => $allData,
                    'stock' => $persediaan
                ];
                $session->setFlashData('msg', 'Obat tidak ditemukan');
            }else {
                $data = [
                    'data' => $getSearchItem,
                    'stock' => $persediaan
                ];
                $session->setFlashData('msg', 'Success');
            }
        }else {
            $getItem = $this->persediaanModel->getItemIn($id);
            if(empty($getItem)){
                $data = [
                    'data' => $allData,
                    'stock' => $persediaan
                ];
                $session->setFlashData('msg', 'Obat tidak ditemukan');
            }else {
                $data = [
                    'data' => $getItem,
                    'stock' => $persediaan
                ];
                $session->setFlashData('msg', 'Success');
            }
        }
        
        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('Persediaan/top_data');
        echo view('Persediaan/itemIn', $data);
        echo view('layout/footer');
    }


    public function itemOut(){
        $session = session();
        $persediaan = $this->persediaanModel->getAllStock();
        $allData = $this->persediaanModel->itemOut();

        $data = [
            'data' => $allData,
            'stock' => $persediaan
        ];

        $session->setFlashData('msg', 'Success');

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('Persediaan/top_data');
        echo view('Persediaan/itemOut', $data);
        echo view('layout/footer');
    }

    public function getitemOut(){
        $session = session();
        $persediaan = $this->persediaanModel->getAllStock();
        $allData = $this->persediaanModel->itemOut();
        
        $id = $this->request->getVar('medId');
        $filter = $this->request->getVar('filter');

        if($filter == "1"){
            $name = $this->request->getVar('medName'); 
            $getSearchItem = $this->persediaanModel->getSearchOut($name);
            if(empty($getSearchItem)){
                $data = [
                    'data' => $allData,
                    'stock' => $persediaan
                ];
                $session->setFlashData('msg', 'Obat tidak ditemukan');
            }else {
                $data = [
                    'data' => $getSearchItem,
                    'stock' => $persediaan
                ];
                $session->setFlashData('msg', 'Success');
            }
        }else {
            $getItem = $this->persediaanModel->getItemOut($id);
            if(empty($getItem)){
                $data = [
                    'data' => $allData,
                    'stock' => $persediaan
                ];
                $session->setFlashData('msg', 'Obat tidak ditemukan');
            }else {
                $data = [
                    'data' => $getItem,
                    'stock' => $persediaan
                ];
                $session->setFlashData('msg', 'Success');
            }
        }
        
        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('Persediaan/top_data');
        echo view('Persediaan/itemIn', $data);
        echo view('layout/footer');
    }

    
