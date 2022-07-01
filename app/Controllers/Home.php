<?php

namespace App\Controllers;

use App\Models\MedicineModel;

class Home extends BaseController
{
    protected $medicineModel;
    public function __construct()
    {
        $this->medicineModel = new MedicineModel();
    }
    public function index()
    {
        if (!isset($_SESSION['id'])) {
            return redirect()->to(base_url('/login'));
        }

        $medicine = $this->medicineModel->findAll();

        $data = [
            'medicine' => $medicine
        ];


        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('index', $data);
        echo view('layout/footer');
    }
}
