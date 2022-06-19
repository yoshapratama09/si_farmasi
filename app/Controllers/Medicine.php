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

    // public function updateObatt()
    // {
    //     $id = $this->request->getVar('idObat');
    //     $nama = $this->request->getVar('namaObat');
    //     $stok = $this->request->getVar('stokObat');
    //     $harga = $this->request->getVar('hargaObat');


    //     $cari = $this->medicineModel->updateObat($id, $nama, $stok, $harga);

    //     if ($cari >= 1) {
    //         session()->setFlashdata('Pesan', 'Update Berhasil');
    //         return redirect()->to(base_url('/Obat'));
    //     }

    //     // return redirect()->to(base_url('/Obat'));
    // }

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

    // Kategori Obat CRUD

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

    public function halamanTambahKategoriObat()
    {

        // session();
        $data = [
            'validation' => \Config\Services::validation()
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/menuMasterData');
        echo view('masterData/menuObat');
        echo view('masterData/tambahKategoriObat', $data);
        echo view('layout/footer');
    }

    public function tambahKategoriObat()
    {
        if (!$this->validate([
            'idKategori' => [
                'rules' => 'required|numeric|is_unique[categorymed.category_id]',
                'errors' => [
                    'required' => 'Id obat harus diisi',
                    'is_unique' => 'Obat dengan Id ini sudah tersedia'
                ]
            ],
            'namaKategori' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/Obat/Kategori/Tambah'))->withInput()->with('validation', $validation);
        }

        $db = db_connect('default');
        $builder = $db->table('categorymed');

        $id = $this->request->getVar('idKategori');
        $nama = $this->request->getVar('namaKategori');

        $cek = $this->medicineModel->cekKategoriObat($id);


        if ($cek <= 0) {
            $data = [
                'category_id' => $this->request->getVar('idKategori'),
                'category_name' => $this->request->getVar('namaKategori')
            ];

            $builder->insert($data);

            session()->setFlashdata('Pesan', 'TambahKategori');
            return redirect()->to(base_url('/Obat/Kategori'));
        } else {
            session()->setFlashdata('Pesan', 'gagalTambahKategori');
            return redirect()->to(base_url('/Obat/Kategori/Tambah'));
        }
    }

    public function hapusKategoriObat($id)
    {
        $db = db_connect('default');
        $builder = $db->table('categorymed');
        $builder->where(['category_id' => $id])->delete();
        session()->setFlashdata('Pesan', 'hapusKategori');
        return redirect()->to(base_url('/Obat'));
    }

    public function halamanUpdateKategoriObat($id)
    {
        $db = db_connect('default');
        $builder = $db->table('categorymed');
        $category = $this->medicineModel->getKategoriUpdate($id)[0];
        // dd($category);
        // exit;
        $data = [
            'title' => "Update Obat",
            'category' => $category,
            'validation' => \Config\Services::validation()
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/menuMasterData');
        echo view('masterData/menuObat');
        echo view('masterData/editKategoriObat', $data);
        echo view('layout/footer');
    }

    public function updateKategoriObat($id)
    {
        $id = $this->request->getVar('idKategori');

        if (!$this->validate([

            'namaKategori' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $db = db_connect('default');
        $builder = $db->table('categorymed');

        $data = [
            'category_name' => $this->request->getVar('namaKategori')
        ];

        $builder->where('category_id', $id);
        $builder->update($data);
        session()->setFlashdata('Pesan', 'UpdateKategori');

        return redirect()->to(base_url('/Obat'));
    }

    public function cariKategoriObat()
    {
        $cari = $this->medicineModel->searchKategoriObat($this->request->getVar('cari'));

        $data = [
            'category' => $cari
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/menuMasterData');
        echo view('masterData/menuObat');
        echo view('masterData/kategoriObat', $data);
        echo view('layout/footer');
    }

    //Tipe obat

    public function halamanTambahTipeObat()
    {

        // session();
        $data = [
            'validation' => \Config\Services::validation()
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/menuMasterData');
        echo view('masterData/menuObat');
        echo view('masterData/tambahTipeObat', $data);
        echo view('layout/footer');
    }

    public function tambahTipeObat()
    {
        if (!$this->validate([
            'idTipe' => [
                'rules' => 'required|numeric|is_unique[typemed.type_id]',
                'errors' => [
                    'required' => 'Id Tipe obat harus diisi',
                    'is_unique' => 'Tipe obat dengan Id ini sudah tersedia'
                ]
            ],
            'namaTipe' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/Obat/Tipe/Tambah'))->withInput()->with('validation', $validation);
        }

        $db = db_connect('default');
        $builder = $db->table('typemed');

        $id = $this->request->getVar('idTipe');
        $nama = $this->request->getVar('namaTipe');

        $cek = $this->medicineModel->cekTipeObat($id);


        if ($cek <= 0) {
            $data = [
                'type_id' => $this->request->getVar('idTipe'),
                'type_name' => $this->request->getVar('namaTipe')
            ];

            $builder->insert($data);

            session()->setFlashdata('Pesan', 'TambahTipe');
            return redirect()->to(base_url('/Obat/Tipe'));
        } else {
            session()->setFlashdata('Pesan', 'gagalTambahTipe');
            return redirect()->to(base_url('/Obat/Tipe/Tambah'));
        }
    }

    public function hapusTipeObat($id)
    {
        $db = db_connect('default');
        $builder = $db->table('typemed');
        $builder->where(['type_id' => $id])->delete();
        session()->setFlashdata('Pesan', 'hapusTipe');
        return redirect()->to(base_url('/Obat/Tipe'));
    }

    public function halamanUpdateTipeObat($id)
    {
        $db = db_connect('default');
        $builder = $db->table('typemed');
        $type = $this->medicineModel->getTipeUpdate($id)[0];
        // dd($type);
        // exit;
        $data = [
            'title' => "Update Obat",
            'type' => $type,
            'validation' => \Config\Services::validation()
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/menuMasterData');
        echo view('masterData/menuObat');
        echo view('masterData/editTipeObat', $data);
        echo view('layout/footer');
    }

    public function updateTipeObat($id)
    {
        $id = $this->request->getVar('idTipe');

        if (!$this->validate([

            'namaTipe' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $db = db_connect('default');
        $builder = $db->table('typemed');

        $data = [
            'type_name' => $this->request->getVar('namaTipe')
        ];

        $builder->where('type_id', $id);
        $builder->update($data);
        session()->setFlashdata('Pesan', 'UpdateTipe');

        return redirect()->to(base_url('/Obat/Tipe'));
    }

    public function cariTipeObat()
    {
        $cari = $this->medicineModel->searchTipeObat($this->request->getVar('cari'));

        $data = [
            'type' => $cari
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/menuMasterData');
        echo view('masterData/menuObat');
        echo view('masterData/TipeObat', $data);
        echo view('layout/footer');
    }

    //satuan obat

    public function halamanSatuanObat()
    {

        $satuan = $this->medicineModel->getSatuan();

        $data = [
            'satuan' => $satuan
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/menuMasterData');
        echo view('masterData/menuObat');
        echo view('masterData/SatuanObat', $data);
        echo view('layout/footer');
    }

    public function halamanTambahSatuanObat()
    {

        // session();
        $data = [
            'validation' => \Config\Services::validation()
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/menuMasterData');
        echo view('masterData/menuObat');
        echo view('masterData/tambahSatuanObat', $data);
        echo view('layout/footer');
    }

    public function tambahSatuanObat()
    {
        if (!$this->validate([
            'idSatuan' => [
                'rules' => 'required|numeric|is_unique[typemed.type_id]',
                'errors' => [
                    'required' => 'Id Satuan obat harus diisi',
                    'is_unique' => 'Satuan obat dengan Id ini sudah tersedia'
                ]
            ],
            'namaSatuan' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/Obat/Satuan/Tambah'))->withInput()->with('validation', $validation);
        }

        $db = db_connect('default');
        $builder = $db->table('satuanmed');

        $id = $this->request->getVar('idSatuan');
        $nama = $this->request->getVar('namaSatuan');

        $cek = $this->medicineModel->cekSatuanObat($id);


        if ($cek <= 0) {
            $data = [
                'satuan_id' => $this->request->getVar('idSatuan'),
                'satuan_name' => $this->request->getVar('namaSatuan')
            ];

            $builder->insert($data);

            session()->setFlashdata('Pesan', 'TambahSatuan');
            return redirect()->to(base_url('/Obat/Satuan'));
        } else {
            session()->setFlashdata('Pesan', 'gagalTambahSatuan');
            return redirect()->to(base_url('/Obat/Satuan/Tambah'));
        }
    }

    public function hapusSatuanObat($id)
    {
        $db = db_connect('default');
        $builder = $db->table('satuanmed');
        $builder->where(['satuan_id' => $id])->delete();
        session()->setFlashdata('Pesan', 'hapusSatuan');
        return redirect()->to(base_url('/Obat/Satuan'));
    }

    public function halamanUpdateSatuanObat($id)
    {
        $db = db_connect('default');
        $builder = $db->table('satuanmed');
        $satuan = $this->medicineModel->getSatuanUpdate($id)[0];
        // dd($type);
        // exit;
        $data = [
            'title' => "Update Obat",
            'satuan' => $satuan,
            'validation' => \Config\Services::validation()
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/menuMasterData');
        echo view('masterData/menuObat');
        echo view('masterData/editSatuanObat', $data);
        echo view('layout/footer');
    }

    public function updateSatuanObat($id)
    {
        $id = $this->request->getVar('idSatuan');

        if (!$this->validate([

            'namaSatuan' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $db = db_connect('default');
        $builder = $db->table('satuanmed');

        $data = [
            'satuan_name' => $this->request->getVar('namaSatuan')
        ];

        $builder->where('satuan_id', $id);
        $builder->update($data);
        session()->setFlashdata('Pesan', 'UpdateSatuan');

        return redirect()->to(base_url('/Obat/Satuan'));
    }
}
