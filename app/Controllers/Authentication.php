<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Authentication extends BaseController
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        
        return view('login/login');
    }
    public function register()
    {
       
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $haspassword = password_hash($password, PASSWORD_BCRYPT);

        $this->userModel->save([
            'username' => $username,
            'email' => $email,
            'password' => $haspassword
        ]);
        return redirect()->to('/login');
    }

    public function check()
    {   
        
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $this->userModel->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                
                return redirect()->to('/dashboard');
            } else {
                return redirect()->to('/login');
            }
        } else {
            return redirect()->to('/login');
        }
    }
}
