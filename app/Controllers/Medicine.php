<?php

namespace App\Controllers;

use App\Models\DataModel;
use App\Models\MedicineModel;
use App\Models\PersediaanModel;
use CodeIgniter\CLI\Console;
use CodeIgniter\Config\Services;
use CodeIgniter\Database\Config;
use CodeIgniter\Validation\StrictRules\Rules;

class Medicine extends BaseController
{
    protected $medicineModel;
    protected $dataModel;
    protected $persediaanModel;
    public function __construct()
    {
        $this->medicineModel = new MedicineModel();
        $this->dataModel = new DataModel();
        $this->persediaanModel = new PersediaanModel();
    }
    public function index()
    {
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        }

        $medicine = $this->medicineModel->getDaftarObat();
        // dd($medicine);
        $category = $this->medicineModel->getKategori();
        $type = $this->medicineModel->getType();
        // $countMed = $this->medicineModel->getCountMed();
        $countMed = $this->medicineModel->getCountDaftarObat();
        $countCategory = $this->medicineModel->getCountCategory();
        $countType = $this->medicineModel->getCountType();

        $data = [
            'medicine' => $medicine,
            'category' => $category,
            'type' => $type,
            'countmed' => $countMed,
            'countcategory' => $countCategory,
            'counttype' => $countType
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/menuMasterData', $data);
        echo view('masterData/menuObat');
        echo view('masterData/daftarObat', $data);
        echo view('layout/footer');
    }

    public function halamanTambahObat()
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            $supplier = $this->dataModel->findAll();
            $type = $this->medicineModel->getType();
            $satuan = $this->medicineModel->getSatuan();
            $kategori = $this->medicineModel->getKategori();

            // session();
            $data = [
                'supplier' => $supplier,
                'type' => $type,
                'satuan' => $satuan,
                'category' => $kategori,
                'validation' => \Config\Services::validation()
            ];
        }


        echo view('layout/header');
        echo view('layout/sidebar');
        // echo view('masterData/menuMasterData');
        // echo view('masterData/menuObat');
        echo view('masterData/tambahObat', $data);
        echo view('layout/footer');
    }

    public function tambahObat()
    {

        // $supplier = $this->request->getPost('namaSupplier');
        // dd($supplier);

        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            if (!$this->validate([
                'idObat' => [
                    'rules' => 'required|numeric|is_unique[medicine.medicine_id]',
                    'errors' => [
                        'required' => 'Id obat harus diisi',
                        'is_unique' => 'Obat dengan Id ini sudah tersedia'
                    ]
                ],
                'namaObat' => [
                    'rules' => 'required|is_unique[medicine.medicine_name]',
                    'errors' => [
                        'required' => 'Nama obat harus diisi',
                        'is_unique' => 'Obat dengan nama ini sudah tersedia'
                    ]
                ],
                'mfdObat' => 'required',
                'expObat' => 'required',
                'stokObat' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Stok obat harus diisi',
                        'numeric' => 'Stok obat harus diisi dengan angka'
                    ]
                ],
                'satuan1' => 'required',
                'satuan2' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Satuan obat (mg) harus diisi',
                        'numeric' => 'Satuan obat (mg) harus diisi dengan angka'
                    ]
                ],
                'modalObat' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Modal obat harus diisi',
                        'numeric' => 'Modal obat harus diisi dengan angka'
                    ]
                ],
                'tipeObat' => 'required',
                'kategoriObat' => 'required',
                'komposisiObat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Komposisi obat harus diisi',
                    ]
                ],
                'fungsiObat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Fungsi obat harus diisi',
                    ]
                ]
            ])) {
                $validation = \Config\Services::validation();
                return redirect()->to(base_url('/Obat/Tambah'))->withInput()->with('validation', $validation);
            }

            $mfdDate = $this->request->getVar('mfdObat');
            $expDate = $this->request->getVar('expObat');

            if ($expDate < $mfdDate) {
                // echo 'gagal';
                session()->setFlashdata('Pesan', 'tanggal');
                return redirect()->to(base_url('/Obat/Tambah'))->withInput();
            } else {
                $db = db_connect('default');
                $builder = $db->table('medicine');

                $builder1 = $db->table('pricemed');
                $builder2 = $db->table('stockmed');

                $id = $this->request->getVar('idObat');
                $stok = $this->request->getVar('stokObat');
                $satuan2 = $this->request->getVar('satuan2');
                $totalMg = $stok * $satuan2;

                //Pricemed
                //status = 0(non aktif), 1 (aktif)
                $statusNew = 1;
                //0(modal) 1 (jual)
                $typeModal = 0;
                $typeJual = 1;
                //type = P = penyesuaian, I = pembelian, O = penjualan
                $stockType = 'I';

                $cek = $this->medicineModel->cekObat($id);

                if ($cek <= 0) {
                    $data = [
                        'medicine_id' => $this->request->getVar('idObat'),
                        'medicine_name' => $this->request->getVar('namaObat'),
                        'medicine_satuan1' => $this->request->getVar('satuan1'),
                        'medicine_satuan2' => $this->request->getVar('satuan2'),
                        'medicine_satuantotal' => $totalMg,
                        'medicine_type' => $this->request->getVar('tipeObat'),
                        'medicine_category' => $this->request->getVar('kategoriObat'),
                        'medicine_comp' => $this->request->getVar('komposisiObat'),
                        'medicine_func' => $this->request->getVar('fungsiObat')
                    ];

                    $builder->insert($data);

                    $dataPrice = [

                        [
                            'medicine_id' => $this->request->getVar('idObat'),
                            'price_amount' => $this->request->getVar('modalObat'),
                            'price_type' => $typeModal,
                            'price_status' => $statusNew
                        ],
                        [
                            'medicine_id' => $this->request->getVar('idObat'),
                            'price_amount' => 0,
                            'price_type' => $typeJual,
                            'price_status' => $statusNew
                        ]
                    ];

                    $builder1->insertBatch($dataPrice);

                    $priceID = $this->persediaanModel->getPriceId($this->request->getVar('idObat'))[0];
                    // dd($priceID);
                    $dataStock = [
                        'medicine_id' => $this->request->getVar('idObat'),
                        'stock_qty' => $this->request->getVar('stokObat'),
                        'stock_status' => $statusNew,
                        'stock_mfd' => $this->request->getVar('mfdObat'),
                        'stock_exp' => $this->request->getVar('expObat'),
                        'stock_type' => $stockType,
                        'price_id' => $priceID
                    ];

                    $builder2->insert($dataStock);

                    session()->setFlashdata('Pesan', 'Tambah');
                    return redirect()->to(base_url('/Obat'));
                } else {
                    session()->setFlashdata('Pesan', 'gagalTambah');
                    return redirect()->to(base_url('/Obat/Tambah'));
                }
            }
        }
    }

    public function hapusObat($id)
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            $cekChildHarga = $this->persediaanModel->cekChildMedHarga($id);
            $cekChildStock = $this->persediaanModel->cekChildMedStock($id);
            // dd($cekChildStock);

            if ($cekChildHarga >= 1 && $cekChildStock <= 0) {
                $db = db_connect('default');
                $builder = $db->table('pricemed');
                $builder->where(['medicine_id' => $id])->delete();

                $this->medicineModel->delete($id);
                session()->setFlashdata('Pesan', 'hapus');
                return redirect()->to(base_url('/Obat'));
            } else if ($cekChildHarga <= 0 && $cekChildStock >= 1) {
                $db = db_connect('default');
                $builder = $db->table('stockmed');
                $builder->where(['medicine_id' => $id])->delete();

                $this->medicineModel->delete($id);
                session()->setFlashdata('Pesan', 'hapus');
                return redirect()->to(base_url('/Obat'));
            } else if ($cekChildHarga >= 1 && $cekChildStock >= 1) {
                $db = db_connect('default');
                $builder = $db->table('pricemed');
                $builder->where(['medicine_id' => $id])->delete();

                $db2 = db_connect('default');
                $builder2 = $db2->table('stockmed');
                $builder2->where(['medicine_id' => $id])->delete();

                $this->medicineModel->delete($id);
                session()->setFlashdata('Pesan', 'hapus');
                return redirect()->to(base_url('/Obat'));
            }
        }
    }

    public function halamanUpdateObat($id)
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            $supplier = $this->dataModel->findAll();
            $type = $this->medicineModel->getType();
            $satuan = $this->medicineModel->getSatuan();
            $kategori = $this->medicineModel->getKategori();
            $medicine = $this->medicineModel->where(['medicine_id' => $id])->first();
            // dd($medicine);
            // exit;
            $data = [
                'supplier' => $supplier,
                'type' => $type,
                'satuan' => $satuan,
                'category' => $kategori,
                'title' => "Update Obat",
                'medicine' => $medicine,
                'validation' => \Config\Services::validation()
            ];
        }


        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/editObat', $data);
        echo view('layout/footer');
    }

    public function updateObat($id)
    {

        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            $id = $this->request->getVar('idObat');
            $medicine = $this->medicineModel->where(['medicine_id' => $id])->first();

            if (!$this->validate([

                'namaObat' => 'required',
                'satuan1' => 'required',
                'tipeObat' => 'required',
                'kategoriObat' => 'required',
                'komposisiObat' => 'required',
                'fungsiObat' => 'required'

            ])) {
                $validation = \Config\Services::validation();
                return redirect()->back()->withInput()->with('validation', $validation);
            }

            $db = db_connect('default');
            $builder = $db->table('medicine');

            $id = $this->request->getVar('idObat');
            $stok = $this->request->getVar('stokObat');
            $satuan2 = $this->request->getVar('satuan2');
            $totalMg = $stok * $satuan2;

            $data = [
                'medicine_name' => $this->request->getVar('namaObat'),
                'medicine_name' => $this->request->getVar('namaObat'),
                'medicine_satuan1' => $this->request->getVar('satuan1'),
                'medicine_type' => $this->request->getVar('tipeObat'),
                'medicine_category' => $this->request->getVar('kategoriObat'),
                'medicine_comp' => $this->request->getVar('komposisiObat'),
                'medicine_func' => $this->request->getVar('fungsiObat')
            ];

            $builder->where('medicine_id', $id);
            $builder->update($data);
            session()->setFlashdata('Pesan', 'Update');

            return redirect()->to(base_url('/Obat'));
        }
    }


    public function cariObat()
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            $cari = $this->medicineModel->searchObat($this->request->getVar('cari'));
            // dd($cari);
            $countMed = $this->medicineModel->getCountDaftarObat();
            $countCategory = $this->medicineModel->getCountCategory();
            $countType = $this->medicineModel->getCountType();
            $data = [
                'medicine' => $cari,
                'countmed' => $countMed,
                'countcategory' => $countCategory,
                'counttype' => $countType
            ];
        }


        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/menuMasterData', $data);
        echo view('masterData/menuObat');
        echo view('masterData/daftarObat', $data);
        echo view('layout/footer');
    }

    // Kategori Obat CRUD

    public function halamanKategoriObat()
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            $category = $this->medicineModel->getKategori();
            $countMed = $this->medicineModel->getCountMed();
            $countCategory = $this->medicineModel->getCountCategory();
            $countType = $this->medicineModel->getCountType();

            $data = [
                'category' => $category,
                'countmed' => $countMed,
                'countcategory' => $countCategory,
                'counttype' => $countType
            ];
        }


        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/menuMasterData', $data);
        echo view('masterData/menuObat');
        echo view('masterData/kategoriObat', $data);
        echo view('layout/footer');
    }

    public function halamanTambahKategoriObat()
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            $data = [
                'validation' => \Config\Services::validation()
            ];
        }
        // session();


        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/tambahKategoriObat', $data);
        echo view('layout/footer');
    }

    public function tambahKategoriObat()
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            if (!$this->validate([
                'idKategori' => [
                    'rules' => 'required|numeric|is_unique[categorymed.category_id]',
                    'errors' => [
                        'required' => 'Id obat harus diisi',
                        'is_unique' => 'Obat dengan Id ini sudah tersedia'
                    ]
                ],
                'namaKategori' => [
                    'rules' => 'required|is_unique[categorymed.category_name]|alpha_space',
                    'errors' => [
                        'required' => 'Nama Kategori obat harus diisi',
                        'is_unique' => 'Kategori Obat dengan nama ini sudah tersedia',
                        'alpha_space' => 'Kategori Obat harus berupa huruf'
                    ]
                ]
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
    }

    public function hapusKategoriObat($id)
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            $db = db_connect('default');
            $builder = $db->table('categorymed');
            $builder->where(['category_id' => $id])->delete();
            session()->setFlashdata('Pesan', 'hapusKategori');
            return redirect()->to(base_url('/Obat/Kategori'));
        }
    }

    public function halamanUpdateKategoriObat($id)
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
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
        }

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/editKategoriObat', $data);
        echo view('layout/footer');
    }

    public function updateKategoriObat($id)
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            $id = $this->request->getVar('idKategori');

            if (!$this->validate([

                'namaKategori' => [
                    'rules' => 'required|is_unique[categorymed.category_name]|alpha_space',
                    'errors' => [
                        'required' => 'Nama Kategori obat harus diisi',
                        'is_unique' => 'Kategori Obat dengan nama ini sudah tersedia',
                        'alpha_space' => 'Kategori Obat harus berupa huruf'
                    ]
                ]
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

            return redirect()->to(base_url('/Obat/Kategori'));
        }
    }

    public function cariKategoriObat()
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            $cari = $this->medicineModel->searchKategoriObat($this->request->getVar('cari'));
            $countMed = $this->medicineModel->getCountDaftarObat();
            $countCategory = $this->medicineModel->getCountCategory();
            $countType = $this->medicineModel->getCountType();
            $data = [
                'category' => $cari,
                'countmed' => $countMed,
                'countcategory' => $countCategory,
                'counttype' => $countType
            ];
        }


        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/menuMasterData', $data);
        echo view('masterData/menuObat');
        echo view('masterData/kategoriObat', $data);
        echo view('layout/footer');
    }

    //Tipe obat


    public function halamanTipeObat()
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            $type = $this->medicineModel->getType();
            $countMed = $this->medicineModel->getCountMed();
            $countCategory = $this->medicineModel->getCountCategory();
            $countType = $this->medicineModel->getCountType();

            $data = [
                'type' => $type,
                'countmed' => $countMed,
                'countcategory' => $countCategory,
                'counttype' => $countType
            ];
        }


        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/menuMasterData', $data);
        echo view('masterData/menuObat');
        echo view('masterData/TipeObat', $data);
        echo view('layout/footer');
    }

    public function halamanTambahTipeObat()
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            $data = [
                'validation' => \Config\Services::validation()
            ];
        }
        // session();


        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/tambahTipeObat', $data);
        echo view('layout/footer');
    }

    public function tambahTipeObat()
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            if (!$this->validate([
                'idTipe' => [
                    'rules' => 'required|numeric|is_unique[typemed.type_id]',
                    'errors' => [
                        'required' => 'Id Tipe obat harus diisi',
                        'numeric' => 'Id Tipe obat harus berupa angka',
                        'is_unique' => 'Tipe obat dengan Id ini sudah tersedia'
                    ]
                ],
                'namaTipe' => [
                    'rules' => 'required|is_unique[typemed.type_name]|alpha_space',
                    'errors' => [
                        'required' => 'Nama Tipe obat harus diisi',
                        'is_unique' => 'Tipe Obat dengan nama ini sudah tersedia',
                        'alpha_space' => 'Tipe obat harus berupa huruf'
                    ]
                ]
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
    }

    public function hapusTipeObat($id)
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            $db = db_connect('default');
            $builder = $db->table('typemed');
            $builder->where(['type_id' => $id])->delete();
            session()->setFlashdata('Pesan', 'hapusTipe');
            return redirect()->to(base_url('/Obat/Tipe'));
        }
    }

    public function halamanUpdateTipeObat($id)
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
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
        }


        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/editTipeObat', $data);
        echo view('layout/footer');
    }

    public function updateTipeObat($id)
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            $id = $this->request->getVar('idTipe');

            if (!$this->validate([

                'namaTipe' => [
                    'rules' => 'required|is_unique[typemed.type_name]|alpha_space',
                    'errors' => [
                        'required' => 'Nama Tipe obat harus diisi',
                        'is_unique' => 'Tipe Obat dengan nama ini sudah tersedia',
                        'alpha_space' => 'Tipe Obat harus berupa huruf'
                    ]
                ]
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
    }

    public function cariTipeObat()
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            $cari = $this->medicineModel->searchTipeObat($this->request->getVar('cari'));
            $countMed = $this->medicineModel->getCountDaftarObat();
            $countCategory = $this->medicineModel->getCountCategory();
            $countType = $this->medicineModel->getCountType();
            $data = [
                'type' => $cari,
                'countmed' => $countMed,
                'countcategory' => $countCategory,
                'counttype' => $countType
            ];
        }


        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/menuMasterData', $data);
        echo view('masterData/menuObat');
        echo view('masterData/TipeObat', $data);
        echo view('layout/footer');
    }

    //satuan obat

    public function halamanSatuanObat()
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            $satuan = $this->medicineModel->getSatuan();
            $countMed = $this->medicineModel->getCountMed();
            $countCategory = $this->medicineModel->getCountCategory();
            $countType = $this->medicineModel->getCountType();

            $data = [
                'satuan' => $satuan,
                'countmed' => $countMed,
                'countcategory' => $countCategory,
                'counttype' => $countType
            ];
        }


        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/menuMasterData', $data);
        echo view('masterData/menuObat');
        echo view('masterData/SatuanObat', $data);
        echo view('layout/footer');
    }

    public function halamanTambahSatuanObat()
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            $data = [
                'validation' => \Config\Services::validation()
            ];
        }
        // session();


        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/tambahSatuanObat', $data);
        echo view('layout/footer');
    }

    public function tambahSatuanObat()
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            if (!$this->validate([
                'idSatuan' => [
                    'rules' => 'required|numeric|is_unique[satuanmed.satuan_id]',
                    'errors' => [
                        'required' => 'Id Satuan obat harus diisi',
                        'is_unique' => 'Satuan obat dengan Id ini sudah tersedia',
                        'numeric' => 'Id satuan obat harus berupa angka'
                    ]
                ],
                'namaSatuan' => [
                    'rules' => 'required|is_unique[satuanmed.satuan_name]|alpha_space',
                    'errors' => [
                        'required' => 'Nama Satuan obat harus diisi',
                        'is_unique' => 'Satuan Obat dengan nama ini sudah tersedia',
                        'alpha_space' => 'Satuan Obat harus berupa huruf'
                    ]
                ]
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
    }

    public function hapusSatuanObat($id)
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            $db = db_connect('default');
            $builder = $db->table('satuanmed');
            $builder->where(['satuan_id' => $id])->delete();
            session()->setFlashdata('Pesan', 'hapusSatuan');
            return redirect()->to(base_url('/Obat/Satuan'));
        }
    }

    public function halamanUpdateSatuanObat($id)
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
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
        }


        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/editSatuanObat', $data);
        echo view('layout/footer');
    }

    public function updateSatuanObat($id)
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            $id = $this->request->getVar('idSatuan');

            if (!$this->validate([
                'namaSatuan' => [
                    'rules' => 'required|is_unique[satuanmed.satuan_name]|alpha_space',
                    'errors' => [
                        'required' => 'Nama Satuan obat harus diisi',
                        'is_unique' => 'Satuan Obat dengan nama ini sudah tersedia',
                        'alpha_space' => 'Satuan obat harus berupa huruf'
                    ]
                ]
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

    public function cariSatuanObat()
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            $cari = $this->medicineModel->searchSatuanObat($this->request->getVar('cari'));
            $countMed = $this->medicineModel->getCountDaftarObat();
            $countCategory = $this->medicineModel->getCountCategory();
            $countType = $this->medicineModel->getCountType();
            $data = [
                'satuan' => $cari,
                'countmed' => $countMed,
                'countcategory' => $countCategory,
                'counttype' => $countType
            ];
        }


        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('masterData/menuMasterData', $data);
        echo view('masterData/menuObat');
        echo view('masterData/SatuanObat', $data);
        echo view('layout/footer');
    }
}
