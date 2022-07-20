<?php

namespace App\Controllers;

use App\Models\PembelianModel;

class Pembelian extends BaseController
{
    protected $pembelianModel;
    public function __construct()
    {
        $this->pembelianModel = new PembelianModel();
    }
    public function index()
    {
        $session = session();
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        }else {
            $data = $this->pembelianModel->findAll();
            $data = [
                'data' => $data
            ];
        }
        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('pembelian/pembelian', $data);
        echo view('layout/footer');
    }

}
