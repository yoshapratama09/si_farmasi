<?php

namespace App\Controllers;

use App\Models\MedicineModel;

class Medicine extends BaseController
{
    protected $medicineModel;
    public function __construct()
    {
        $this->medicineModel = new MedicineModel();
    }
    public function index()
    {

        $medicine = $this->medicineModel->findAll();
        $category = $this->medicineModel->getKategori();
        $type = $this->medicineModel->getType();

        $data = [
            'medicine' => $medicine,
            'category' => $category,
            'type' => $type
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('layout/menuMasterData');
        echo view('layout/menuObat');
        echo view('masterData/daftarObat', $data);
        echo view('layout/footer');
    }

    public function tambahObat()
    {
        $db = db_connect('default');
        $builder = $db->table('medicine');

        $data = [
            'medicine_id' => $this->request->getVar('idObat'),
            'medicine_name' => $this->request->getVar('namaObat'),
            'medicine_stock' => $this->request->getVar('stokObat'),
            'medicine_price' => $this->request->getVar('hargaObat')
        ];

        $builder->insert($data);

        session()->setFlashdata('Pesan', 'Berhasil');
        return redirect()->to(base_url('/Obat'));
    }

    public function hapusObat($id)
    {
        $this->medicineModel->delete($id);
        return redirect()->to(base_url('/Obat'));
    }

    public function halamanUpdateObat($id)
    {
        $medicine = $this->medicineModel->where(['medicine_id' => $id])->first();
        // dd($medicine);
        // exit;

        $data = [
            'title' => "Update Obat",
            'medicine' => $medicine
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('layout/menuMasterData');
        echo view('layout/menuObat');
        // echo view('masterData/daftarObat', $data);
        echo view('masterData/editObat', $data);
        echo view('layout/footer');
    }

    public function updateObat($id)
    {
        $db = db_connect('default');
        $builder = $db->table('medicine');

        $data = [
            'medicine_name' => $this->request->getVar('namaObat'),
            'medicine_stock' => $this->request->getVar('stokObat'),
            'medicine_price' => $this->request->getVar('hargaObat')
        ];

        $builder->where('medicine_id', $id);
        $builder->update($data);
        return redirect()->to(base_url('/Obat'));
    }

    public function halamanTambahObat()
    {

        // $data = [
        //     'medicine' => $medicine,
        //     'category' => $category,
        //     'type' => $type
        // ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('layout/menuMasterData');
        echo view('layout/menuObat');
        echo view('masterData/tambahObat');
        echo view('layout/footer');
    }

    public function halamanKategoriObat()
    {

        $category = $this->medicineModel->getKategori();

        $data = [
            'category' => $category
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('layout/menuMasterData');
        echo view('layout/menuObat');
        echo view('masterData/kategoriObat', $data);
        echo view('layout/footer');
    }

    public function halamanTipeObat()
    {

        $type = $this->medicineModel->getType();

        $data = [
            'type' => $type
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('layout/menuMasterData');
        echo view('layout/menuObat');
        echo view('masterData/TipeObat', $data);
        echo view('layout/footer');
    }
}
