<?php

namespace App\Controllers;

use App\Models\DataModel;
use CodeIgniter\Config\Services;
use CodeIgniter\Database\Config;
use CodeIgniter\Validation\StrictRules\Rules;

class Data extends BaseController
{

    protected $dataModel;
    public function __construct()
    {
        $this->dataModel = new DataModel();
    }
    public function index()
    {
        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('data-data/data');
        echo view('layout/footer');
    }
    public function supplier()
    {
        $supplier = $this->dataModel->supplier();
        $data = [
            'data' => $supplier,
            'validation' => \Config\Services::validation()
        ];
        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('data-data/supplier', $data);
        echo view('layout/footer');
    }

    public function halamanTambahSup()
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            $supplier = $this->dataModel->supplier();
            $data = [
                'data' => $supplier,
                'validation' => \Config\Services::validation()
            ];
        }
        echo view('layout/header');
        echo view('layout/sidebar');
        // echo view('masterData/menuMasterData');
        // echo view('masterData/menuObat');
        echo view('data-data/tambahSup', $data);
        echo view('layout/footer');
    }

    public function dokter()
    {
        $dokter = $this->dataModel->dokter();

        $data = [
            'data' => $dokter
        ];
        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('data-data/dokter', $data);
        echo view('layout/footer');
    }

    public function pasien()
    {
        $pasien = $this->dataModel->pasien();

        $data = [
            'data' => $pasien
        ];
        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('data-data/pasien', $data);
        echo view('layout/footer');
    }

    public function rumahsakit()
    {
        $rumahsakit = $this->dataModel->rumahsakit();

        $data = [
            'data' => $rumahsakit
        ];
        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('data-data/rumahsakit', $data);
        echo view('layout/footer');
    }

    public function tambahSupplier()
    {
        $session = session();
        if (!$this->validate([
            'idSup' => [
                'rules' => 'required|numeric|is_unique[supplier.supplier_id]',
                'errors' => [
                    'required' => 'Id Supplier harus diisi',
                    'is_unique' => 'Supplier dengan Id ini sudah tersedia'
                ]
            ],
            'namaSup' => [
                'rules' =>  'required|alpha_space|is_unique[supplier.supplier_name]',
                'errors' => [
                    'required' => 'Nama Supplier harus diisi',
                    'is_unique' => 'Supplier dengan nama ini sudah tersedia',
                    'alpha' => 'Nama harus berupa karakter tanpa angka'
                ]
            ],
            'alamatSup' => [
                'rules' =>  'required',
                'errors' => [
                    'required' => 'Alamat Supplier harus diisi',
                ]
            ],
            'kotaSup' => [
                'rules' =>  'required',
                'errors' => [
                    'required' => 'Kota Supplier harus diisi',
                ]
            ],
            'provSup' => [
                'rules' =>  'required',
                'errors' => [
                    'required' => 'Provinsi Supplier harus diisi',
                ]
            ],
            'posSup' => [
                'rules' =>  'required|numeric|trim|max_length[5]',
                'errors' => [
                    'required' => 'Kode Pos Supplier harus diisi',
                    'max_length' => 'nomor maksimal 5 digit'
                ]
            ],
            'faxSup' => [
                'rules' =>  'required|numeric',
                'errors' => [
                    'required' => 'Fax Supplier harus diisi',
                ]
            ],
            'jenisSup' => [
                'rules' =>  'required',
                'errors' => [
                    'required' => 'Jenis Supplier harus diisi',
                ]
            ],
            'emailSup' => [
                'rules' =>  'required|trim|valid_email|is_unique[supplier.supplier_email]',
                'errors' => [
                    'required' => 'Email Supplier harus diisi',
                ]
            ],
            'phoneSup' => [
                'rules' =>  'required|numeric|trim|max_length[12]',
                'errors' => [
                    'required' => 'No.Telp Supplier harus diisi',
                    'max_length' => 'nomor maksimal 12 digit'
                ]
            ]

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/supplier/Tambah',)->withInput()->with('validation', $validation);;
        }
        $id = $this->request->getVar('idSup');
        $cek = $this->dataModel->cekSup($id);
        $db = db_connect('default');
        $builder = $db->table('supplier');
        if ($cek <= 0) {
            $data = [
                'supplier_id' => $this->request->getVar('idSup'),
                'supplier_name' => $this->request->getVar('namaSup'),
                'supplier_address' => $this->request->getVar('alamatSup'),
                'supplier_kota' => $this->request->getVar('kotaSup'),
                'supplier_prov' => $this->request->getVar('provSup'),
                'supplier_pos' => $this->request->getVar('posSup'),
                'supplier_fax' => $this->request->getVar('faxSup'),
                'supplier_jenis' => $this->request->getVar('jenisSup'),
                'supplier_email' => $this->request->getVar('emailSup'),
                'supplier_phone' => $this->request->getVar('phoneSup')
            ];
            $builder->insert($data);
            session()->setFlashdata('Pesan', 'Tambah');
            return redirect()->to(base_url('/supplier'));
        } else {
            session()->setFlashdata('Pesan', 'gagalTambah');
            return redirect()->to('/supplier/Tambah');
        }
    }

    public function tambahDokter()
    {
        $db = db_connect('default');
        $builder = $db->table('dokter');
        $data = [
            'dokter_id' => $this->request->getVar('idDok'),
            'dokter_nama' => $this->request->getVar('namaDok'),
            'dokter_alamat' => $this->request->getVar('alamatDok'),
            'dokter_kontak' => $this->request->getVar('kontakDok'),
            'jabatan' => $this->request->getVar('jabatanDok')
        ];
        $builder->insert($data);

        return redirect()->to('/dokter');
    }

    public function tambahPasien()
    {
        $db = db_connect('default');
        $builder = $db->table('pasien');
        $data = [
            'pasien_id' => $this->request->getVar('idPas'),
            'pasien_nama' => $this->request->getVar('namaPas'),
            'pasien_dob' => $this->request->getVar('ttl'),
            'pasien_gender' => $this->request->getVar('gender'),
            'pasien_address' => $this->request->getVar('alamatPas'),
            'pasien_phone' => $this->request->getVar('kontakPas')
        ];
        $builder->insert($data);

        return redirect()->to('/pasien');
    }

    public function tambahRumahsakit()
    {
        $db = db_connect('default');
        $builder = $db->table('rumahsakit');
        $data = [
            'no_RS' => $this->request->getVar('noRS'),
            'nama_RS' => $this->request->getVar('namaRS'),
            'alamat_RS' => $this->request->getVar('alamatRS'),
            'kategori_RS' => $this->request->getVar('katRS'),
            'kontak_RS' => $this->request->getVar('kontakRS')
        ];
        $builder->insert($data);

        return redirect()->to('/rumahsakit');
    }

    function hapus_supplier($id)
    {
        $this->dataModel->delete($id);
        session()->setFlashdata('Pesan', 'hapus');
        return redirect()->to(base_url('/supplier'));
    }

    function hapus_dokter($id)
    {
        $db = db_connect('default');
        $builder = $db->table('dokter');
        $builder->where(['dokter_id' => $id])->delete();
        session()->setFlashdata('Pesan', 'hapus');
        return redirect()->to(base_url('/dokter'));
    }

    function hapus_pasien($id)
    {
        $this->dataModel->delete($id);
        session()->setFlashdata('Pesan', 'hapus');
        return redirect()->to(base_url('/pasien'));
    }

    function hapus_rumahsakit($id)
    {
        $this->dataModel->delete($id);
        session()->setFlashdata('Pesan', 'hapus');
        return redirect()->to(base_url('/rumahsakit'));
    }

    public function halamanUpdateSupplier($id)
    {
        $db = db_connect('default');
        $builder = $db->table('supplier');
        $supplier = $this->dataModel->supplier($id)[0];
        //dd($supplier);
        // exit;
        $data = [
            'title' => "Update Supplier",
            'supplier' => $supplier,
            'validation' => \Config\Services::validation()
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('data-data/editsupplier', $data);
        echo view('layout/footer');
    }

    public function UpdateSupplier($id)
    {
        $session = session();
        if (!$this->validate([
            'idSup' => 'required',
            'namaSup' => 'required',
            'alamatSup' => 'required',
            'kotaSup' => 'required',
            'provSup' => 'required',
            'posSup' => 'required',
            'faxSup' => 'required',
            'jenisSup' => 'required',
            'emailSup' => 'required',
            'phoneSup' => 'required',
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }
        $id = $this->request->getVar('idSup');
        $supplier = $this->dataModel->where(['supplier_id' => $id])->first();
        $db = db_connect('default');
        $builder = $db->table('supplier');
        $data = [
            'supplier_id' => $this->request->getVar('idSup'),
            'supplier_name' => $this->request->getVar('namaSup'),
            'supplier_address' => $this->request->getVar('alamatSup'),
            'supplier_kota' => $this->request->getVar('kotaSup'),
            'supplier_prov' => $this->request->getVar('provSup'),
            'supplier_pos' => $this->request->getVar('posSup'),
            'supplier_fax' => $this->request->getVar('faxSup'),
            'supplier_jenis' => $this->request->getVar('jenisSup'),
            'supplier_email' => $this->request->getVar('emailSup'),
            'supplier_phone' => $this->request->getVar('phoneSup')
        ];
        $builder->where('supplier_id', $id);
        $builder->update($data);
        session()->setFlashdata('Pesan', 'Update');
        return redirect()->to(base_url('/supplier'));
    }

    public function cariDokter()
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        } else {
            $cari = $this->dataModel->searchDokter($this->request->getVar('cari'));
            // dd($cari);
            $data = [
                'dokter' => $cari,
            ];
        }
        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('data-data/dokter', $data);
        echo view('layout/footer');
    }

    public function halamanUpdateDokter($id)
    {
        $db = db_connect('default');
        $builder = $db->table('dokter');
        $dokter = $this->dataModel->dokter($id)[0];
        //dd($supplier);
        // exit;
        $data = [
            'title' => "Update Dokter",
            'dokter' => $dokter,
            'validation' => \Config\Services::validation()
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('data-data/editdokter', $data);
        echo view('layout/footer');
    }

    public function UpdateDokter($id)
    {
        $id = $this->request->getVar('idDok');
        $db = db_connect('default');
        $builder = $db->table('dokter');
        $data = [
            'dokter_id' => $this->request->getVar('idDok'),
            'dokter_nama' => $this->request->getVar('namaDok'),
            'dokter_alamat' => $this->request->getVar('alamatDok'),
            'dokter_kontak' => $this->request->getVar('kontakDok'),
            'jabatan' => $this->request->getVar('jabatanDok')
        ];
        $builder->where('dokter_id', $id);
        $builder->update($data);
        return redirect()->to(base_url('/dokter'));
    }

    public function halamanUpdatePasien($id)
    {
        $db = db_connect('default');
        $builder = $db->table('pasien');
        $pasien = $this->dataModel->pasien($id)[0];
        //dd($supplier);
        // exit;
        $data = [
            'title' => "Update Pasien",
            'pasien' => $pasien,
            'validation' => \Config\Services::validation()
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('data-data/editpasien', $data);
        echo view('layout/footer');
    }

    public function UpdatePasien($id)
    {
        $id = $this->request->getVar('idPas');
        $pasien = $this->dataModel->where(['pasien_id' => $id])->first();
        $db = db_connect('default');
        $builder = $db->table('pasien');
        $data = [
            'pasien_id' => $this->request->getVar('idPas'),
            'pasien_nama' => $this->request->getVar('namaPas'),
            'pasien_dob' => $this->request->getVar('ttl'),
            'pasien_gender' => $this->request->getVar('gender'),
            'pasien_address' => $this->request->getVar('alamatPas'),
            'pasien_phone' => $this->request->getVar('kontakPas')
        ];
        $builder->where('pasien_id', $id);
        $builder->update($data);
        return redirect()->to(base_url('/pasien'));
    }

    public function halamanUpdateRumahsakit($id)
    {
        $db = db_connect('default');
        $builder = $db->table('rumahsakit');
        $rumahsakit = $this->dataModel->rumahsakit($id)[0];
        //dd($supplier);
        // exit;
        $data = [
            'title' => "Update Rumah Sakit",
            'rumahsakit' => $rumahsakit,
            'validation' => \Config\Services::validation()
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('data-data/editRumahsakit', $data);
        echo view('layout/footer');
    }

    public function UpdateRumahsakit($id)
    {
        $id = $this->request->getVar('noRS');
        $db = db_connect('default');
        $builder = $db->table('rumahsakit');
        $data = [
            'no_RS' => $this->request->getVar('noRS'),
            'nama_RS' => $this->request->getVar('namaRS'),
            'alamat_RS' => $this->request->getVar('alamatRS'),
            'kategori_RS' => $this->request->getVar('katRS'),
            'kontak_RS' => $this->request->getVar('kontakRS')
        ];
        $builder->where('no_RS', $id);
        $builder->update($data);
        return redirect()->to(base_url('/rumahsakit'));
    }
}
