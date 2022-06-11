<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{
    protected $loginModel;
    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }
    public function index()
    {
        $login = $this->loginModel->findAll();

        $data = [
            'data' => $login
        ];

        echo view('login', $data);
    }
}
