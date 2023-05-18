<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Authentication extends BaseController
{
    protected $userModel;

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
        // return view('login/register');
        // if (!$this->validate([

        //     'username' => [
        //         'rules' => 'required|is_unique[master_user.username]',
        //         'errors' => [
        //             'required' => '{field} harus diisi',
        //             'is_unique' => '{field} sudah terdaftar'
        //         ]
        //     ],
        //     'email' => [
        //         'rules' => 'required|valid_email',
        //         'errors' => [
        //             'required' => '{field} harus diisi',
        //             'valid_email' => '{field} tidak valid'
        //         ]
        //     ],
        //     'password' => [
        //         'rules' => 'required|min_length[8]',
        //         'errors' => [
        //             'required' => '{field} harus diisi',

        //         ]
        //     ],
        // ])) {
        //     return redirect()->back()->withInput();
        // }
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
