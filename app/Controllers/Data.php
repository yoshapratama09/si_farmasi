<?php

namespace App\Controllers;

use App\Models\DataModel;

class Data extends BaseController
{
    protected $dataModel;
    public function __construct()
    {
        $this->dataModel = new DataModel();
    }
    public function index()
    {
        $supplier = $this->dataModel->findAll();

        $data = [
            'data' => $supplier
        ];

        echo view('layout/header');
        echo view('layout/sidebar');
        echo view('data', $data);
        echo view('layout/footer');
    }
}
