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

        $medicine = $this->medicineModel->findAll();

        $data = [
            'medicine' => $medicine
        ];


        echo view('layout/header');
        echo view('index', $data);
        echo view('layout/footer');
    }
}
