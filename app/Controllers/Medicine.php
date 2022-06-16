<?php

namespace App\Controllers;

use App\Models\MedicineModel;
use CodeIgniter\Config\Services;
use CodeIgniter\Database\Config;
use CodeIgniter\Validation\StrictRules\Rules;

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
        echo view('masterData/menuMasterData');
        echo view('masterData/menuObat');
        echo view('masterData/daftarObat', $data);
        echo view('layout/footer');
    }

    public function tambahObat()
    {
        if (!$this->validate([
            'idObat' => [
                'rules' => 'required|numeric|is_unique[medicine.medicine_id]',
                'errors' => [
                    'required' => 'Id obat harus diisi',
                    'is_unique' => 'Obat dengan Id ini sudah tersedia'
                ]
            ],
            'namaObat' => 'required',
            'stokObat' => 'required|numeric',
            'hargaObat' => 'required|numeric'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/Obat/Tambah'))->withInput()->with('validation', $validation);
        }

        $db = db_connect('default');
        $builder = $db->table('medicine');

        $id = $this->request->getVar('idObat');
        $nama = $this->request->getVar('namaObat');
        $stok = $this->request->getVar('stokObat');
        $harga = $this->request->getVar('hargaObat');

        $cek = $this->medicineModel->cekObat($id);


        if ($cek <= 0) {
            $data = [
                'medicine_id' => $this->request->getVar('idObat'),
                'medicine_name' => $this->request->getVar('namaObat'),
                'medicine_stock' => $this->request->getVar('stokObat'),
                'medicine_price' => $this->request->getVar('hargaObat')
            ];

            $builder->insert($data);

            session()->setFlashdata('Pesan', 'Tambah');
            return redirect()->to(base_url('/Obat'));
        } else {
            session()->setFlashdata('Pesan', 'gagalTambah');
            return redirect()->to(base_url('/Obat/Tambah'));
        }
    }

    public function hapusObat($id)
    {
        $this->medicineModel->delete($id);
        session()->setFlashdata('Pesan', 'hapus');
        return redirect()->to(base_url('/Obat'));
    }

    public function halamanUpdateObat($id)
    {
        $medicine = $this->medicineModel->where(['medicine_id' => $id])->first();
        // dd($medicine);
        // exit;
        $data = [
            'title' => "Update Obat",
            'medicine' => $medicine,
            'validation' => \Config\Services::validation()
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/menuMasterData');
        echo view('masterData/menuObat');
        echo view('masterData/editObat', $data);
        echo view('layout/footer');
    }

    public function updateObat($id)
    {
        $id = $this->request->getVar('idObat');

        if (!$this->validate([

            'namaObat' => 'required',
            'stokObat' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'stok obat harus diisi',
                    'numeric' => 'Stok obat harus diiisi dengan angka'
                ]
            ],
            'hargaObat' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'stok obat harus diisi',
                    'numeric' => 'Stok obat harus diiisi dengan angka'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $db = db_connect('default');
        $builder = $db->table('medicine');

        $data = [
            'medicine_name' => $this->request->getVar('namaObat'),
            'medicine_stock' => $this->request->getVar('stokObat'),
            'medicine_price' => $this->request->getVar('hargaObat')
        ];

        $builder->where('medicine_id', $id);
        $builder->update($data);
        session()->setFlashdata('Pesan', 'Update');

        return redirect()->to(base_url('/Obat'));
    }

    public function updateObatt()
    {
        $id = $this->request->getVar('idObat');
        $nama = $this->request->getVar('namaObat');
        $stok = $this->request->getVar('stokObat');
        $harga = $this->request->getVar('hargaObat');


        $cari = $this->medicineModel->updateObat($id, $nama, $stok, $harga);

        if ($cari >= 1) {
            session()->setFlashdata('Pesan', 'Update Berhasil');
            return redirect()->to(base_url('/Obat'));
        }

        // return redirect()->to(base_url('/Obat'));
    }

    public function halamanTambahObat()
    {

        // session();
        $data = [
            'validation' => \Config\Services::validation()
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/menuMasterData');
        echo view('masterData/menuObat');
        echo view('masterData/tambahObat', $data);
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
        echo view('masterData/menuMasterData');
        echo view('masterData/menuObat');
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
        echo view('masterData/menuMasterData');
        echo view('masterData/menuObat');
        echo view('masterData/TipeObat', $data);
        echo view('layout/footer');
    }

    public function cariObat()
    {
        $cari = $this->medicineModel->searchObat($this->request->getVar('cari'));

        $data = [
            'medicine' => $cari
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/menuMasterData');
        echo view('masterData/menuObat');
        echo view('masterData/daftarObat', $data);
        echo view('layout/footer');
    }
}
