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

    public function loginAuth(){
        $session = session();
        $user = new LoginModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $user->where('employee_username', $username)->first();

        if($data){
            if(strtolower($data['employee_departemen']) == 'farmasi'){ 
                $pass = $data['employee_pass'];
                $authPass = password_verify($password, $pass);
                if($password == $pass){
                    $ses_data = [
                        'id' => $data['employee_id'],
                        'name' => $data['employee_name'],
                        'isLoggedIn' => TRUE
                    ];
                    $session->set($ses_data);
                    return redirect()->to(base_url('/'));
                }else{
                    $session->setFlashData('msg', 'Password anda salah');
                    return redirect()->to(base_url('/login'));
                }
            }else {
                $session->setFlashData('msg', 'Anda tidak memiliki hak akses terhadap sistem');
                return redirect()->to(base_url('/login'));
            } 
        }else {
            $session->setFlashData('msg', 'Username tidak ditemukan');
            return redirect()->to(base_url('/login'));
        }
    
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }

}
