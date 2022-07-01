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
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        }else {
            if(empty($this->request->getPost())){
                $id = 0;
                $persediaan = $this->persediaanModel->getAllStock();
                $getItem = $this->persediaanModel->getOpname($id);

                $data = [
                    'data' => $getItem,
                    'stock' => $persediaan
                ];
            }else{
                $id = $this->request->getVar('medId');
                $persediaan = $this->persediaanModel->getAllStock();
                $harga = $this->persediaanModel->getHarga($id);

                $getItem = $this->persediaanModel->getOpname($id);
                if (empty($getItem)) {
                    $stock1 = $this->persediaanModel->getStockMed($id);
                    $data = [
                        'data' => $stock1,
                        'stock' => $persediaan,
                        'harga' => $harga
                    ];
                } else {
                    $data = [
                        'data' => $getItem,
                        'stock' => $persediaan,
                        'harga' => $harga
                    ];
                    $session->setFlashData('msg', 'Success');
                }
            }
        }

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('Persediaan/top_data');
        echo view('Persediaan/opname', $data);
        echo view('layout/footer');
    }


    public function penyesuaianHarga()
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        }else {
            if(empty($this->request->getPost())){
                $allData = $this->persediaanModel->getAllStock();
                $getPSales = $this->persediaanModel->getHarga1();
                $getPCapital = $this->persediaanModel->getHarga2();

                $data = [
                    'data' => $allData,
                    'allData' => $allData,
                    'sales' => $getPSales,
                    'capital' => $getPCapital
                ];
                $session->setFlashData('msg', 'Success');
            }else{
                $id = $this->request->getVar('medId');
                $filter = $this->request->getVar('filter');

                $allData = $this->persediaanModel->getAllStock();
                $getPSales = $this->persediaanModel->getHarga1();
                $getPCapital = $this->persediaanModel->getHarga2();

                if ($filter == "1") {
                    $name = $this->request->getVar('medName');
                    $getSearch = $this->persediaanModel->getSearch($name);
                    if (empty($getSearch)) {
                        $data = [
                            'data' => $allData,
                            'allData' => $allData,
                            'sales' => $getPSales,
                            'capital' => $getPCapital
                        ];
                        $session->setFlashData('msg', 'Obat tidak ditemukan');
                    } else {
                        $data = [
                            'data' => $getSearch,
                            'allData' => $allData,
                            'sales' => $getPSales,
                            'capital' => $getPCapital
                        ];
                        $session->setFlashData('msg', 'Success');
                    }
                } else {
                    $getMedicine = $this->persediaanModel->getMed($id);
                    if (empty($getMedicine)) {
                        $data = [
                            'data' => $getMedicine,
                            'allData' => $allData,
                            'sales' => $getPSales,
                            'capital' => $getPCapital
                        ];
                        $session->setFlashData('msg', 'Obat tidak ditemukan');
                    }else if (empty($this->persediaanModel->getMedicine($id))){
                        $data = [
                            'data' => $getMedicine,
                            'allData' => $allData,
                            'sales' => $getPSales,
                            'capital' => $getPCapital
                        ];
                        $session->setFlashData('msg', 'Success');
                    }else {
                        $getMedicine = $this->persediaanModel->getMedicine($id);
                        $data = [
                            'data' => $getMedicine,
                            'allData' => $allData,
                            'sales' => $getPSales,
                            'capital' => $getPCapital
                        ];
                        $session->setFlashData('msg', 'Success');
                    }
                }
            }
        }

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('Persediaan/top_data');
        echo view('Persediaan/penyesuaian_harga', $data);
        echo view('layout/footer');
    }

    

    public function updateHarga()
    {
        $session = session();
        $array = array();
        $harga = $this->request->getVar('hargaB');
        $idObat = $this->request->getVar('idObat');
        $idPrice = $this->request->getVar('idPrice');

        $db = db_connect('default');
        $builder = $db->table('pricemed');

        $index = 0;
        foreach ($idObat as $id) {
            if ($harga[$index] != null) {
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
        $builder = $db->table('pricemed');
        $builder->insertBatch($array);
        $session->setFlashData('msg', 'Success');

        return redirect()->to(base_url('/persediaan/pHarga'));
    }

    public function dataExp()
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        }else{
            if(empty($this->request->getPost())){
                $persediaan = $this->persediaanModel->findAll();
                $allData = $this->persediaanModel->getDataExp();
        
                $data = [
                    'data' => $allData,
                    'medicine' => $allData
                ];
                $session->setFlashData('msg', 'Success');
            }else{
                $id = $this->request->getVar('medId');
                $filter = $this->request->getVar('filter');

                $allData = $this->persediaanModel->getDataExp();
                $medicine = $this->persediaanModel->findAll();

                if ($filter == "1") {
                    $name = $this->request->getVar('medName');
                    $getSearch = $this->persediaanModel->getSearch($name);
                    if (empty($getSearch)) {
                        $data = [
                            'data' => $allData,
                            'medicine' => $allData
                        ];
                        $session->setFlashData('msg', 'Obat tidak ditemukan');
                    } else {
                        $data = [
                            'data' => $getSearch,
                            'medicine' => $allData
                        ];
                        $session->setFlashData('msg', 'Success');
                    }
                } else {
                    $getMedicine = $this->persediaanModel->getMedicine($id);
                    if (empty($getMedicine)) {
                        $data = [
                            'data' => $allData,
                            'medicine' => $allData
                        ];
                        $session->setFlashData('msg', 'Obat tidak ditemukan');
                    } else {
                        $data = [
                            'data' => $getMedicine,
                            'medicine' => $allData
                        ];
                        $session->setFlashData('msg', 'Success');
                    }
                }
            }
        }

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('Persediaan/top_data');
        echo view('Persediaan/dataExp', $data);
        echo view('layout/footer');
    }

    public function penyesuaianStok()
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        }else{
            $allData = $this->persediaanModel->getAllStock();
            $invoice = $this->persediaanModel->getIdPstock();
            if(empty($this->request->getPost())){
                $data = [
                    'data' => $allData,
                    'allData' => $allData,
                    'invoice' => $invoice
                ];
                $session->setFlashData('msg', 'Success');
            }else{
                $id = $this->request->getVar('medId');
                $filter = $this->request->getVar('filter');
                $medicine = $this->persediaanModel->findAll();

                if ($filter == "1") {
                    $name = $this->request->getVar('medName');
                    $getSearch = $this->persediaanModel->getSearch($name);
                    if (empty($getSearch)) {
                        $data = [
                            'data' => $allData,
                            'allData' => $allData,
                            'invoice' => $invoice
                        ];
                        $session->setFlashData('msg', 'Obat tidak ditemukan');
                    } else {
                        $data = [
                            'data' => $getSearch,
                            'allData' => $allData,
                            'invoice' => $invoice
                        ];
                        $session->setFlashData('msg', 'Success');
                    }
                } else {
                    $getMedicine = $this->persediaanModel->getMedicine($id);
                    if (empty($getMedicine)) {
                        $data = [
                            'data' => $allData,
                            'allData' => $allData,
                            'invoice' => $invoice
                        ];
                        $session->setFlashData('msg', 'Obat tidak ditemukan');
                    } else {
                        $data = [
                            'data' => $getMedicine,
                            'allData' => $allData,
                            'invoice' => $invoice
                        ];
                        $session->setFlashData('msg', 'Success');
                    }
                }
            }
        }
        
        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('Persediaan/top_data');
        echo view('Persediaan/penyesuaian_stok', $data);
        echo view('layout/footer');
    }

    public function updateStock()
    {
        $session = session();
        $array = array();
        $qty = $this->request->getVar('qtyBaru');
        $idObat = $this->request->getVar('idObat');
        $idStock = $this->request->getVar('idStock');
        $invoice = $this->request->getVar('idPs');

        $db = db_connect('default');
        $builder = $db->table('stockmed');

        $index = 0;
        foreach ($idObat as $id) {
            if ($qty[$index] != null) {
                array_push($array, array(
                    'medicine_id' => $id,
                    'stock_qty' => $qty[$index],
                    'stock_status' => 1,
                    'stock_invoice' => $invoice,
                    'stock_type' => 'P'
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

    public function itemIn()
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        }else{
            $persediaan = $this->persediaanModel->getAllStock();
            $allData = $this->persediaanModel->itemIn();
            if(empty($this->request->getPost())){
                $data = [
                    'data' => $allData,
                    'stock' => $persediaan
                ];
                $session->setFlashData('msg', 'Success');
            }else{
                $id = $this->request->getVar('medId');
                $filter = $this->request->getVar('filter');

                if ($filter == "1") {
                    $name = $this->request->getVar('medName');
                    $getSearchItem = $this->persediaanModel->getSearchIn($name);
                    if (empty($getSearchItem)) {
                        $data = [
                            'data' => $allData,
                            'stock' => $persediaan
                        ];
                        $session->setFlashData('msg', 'Obat tidak ditemukan');
                    } else {
                        $data = [
                            'data' => $getSearchItem,
                            'stock' => $persediaan
                        ];
                        $session->setFlashData('msg', 'Success');
                    }
                } else {
                    $getItem = $this->persediaanModel->getItemIn($id);
                    if (empty($getItem)) {
                        $data = [
                            'data' => $allData,
                            'stock' => $persediaan
                        ];
                        $session->setFlashData('msg', 'Obat tidak ditemukan');
                    } else {
                        $data = [
                            'data' => $getItem,
                            'stock' => $persediaan
                        ];
                        $session->setFlashData('msg', 'Success');
                    }
                }
            }
        }
            
        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('Persediaan/top_data');
        echo view('Persediaan/itemIn', $data);
        echo view('layout/footer');
    }

    public function itemOut()
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        }else{
            $persediaan = $this->persediaanModel->getAllStock();
            $allData = $this->persediaanModel->itemOut();
            if(empty($this->request->getPost())){
                $data = [
                    'data' => $allData,
                    'stock' => $persediaan
                ];
                $session->setFlashData('msg', 'Success');
            }else{
                $id = $this->request->getVar('medId');
                $filter = $this->request->getVar('filter');

                if ($filter == "1") {
                    $name = $this->request->getVar('medName');
                    $getSearchItem = $this->persediaanModel->getSearchOut($name);
                    if (empty($getSearchItem)) {
                        $data = [
                            'data' => $allData,
                            'stock' => $persediaan
                        ];
                        $session->setFlashData('msg', 'Obat tidak ditemukan');
                    } else {
                        $data = [
                            'data' => $getSearchItem,
                            'stock' => $persediaan
                        ];
                        $session->setFlashData('msg', 'Success');
                    }
                } else {
                    $getItem = $this->persediaanModel->getItemOut($id);
                    if (empty($getItem)) {
                        $data = [
                            'data' => $allData,
                            'stock' => $persediaan
                        ];
                        $session->setFlashData('msg', 'Obat tidak ditemukan');
                    } else {
                        $data = [
                            'data' => $getItem,
                            'stock' => $persediaan
                        ];
                        $session->setFlashData('msg', 'Success');
                    }
                }
            }
            
        }

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('Persediaan/top_data');
        echo view('Persediaan/itemOut', $data);
        echo view('layout/footer');
    }

    
}
