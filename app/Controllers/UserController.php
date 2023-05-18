<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use CodeIgniter\I18n\Time;

class UserController extends BaseController
{
    protected $data;
    protected $model, $session, $jenis;
    public function __construct()
    {
        $this->model = new ProductModel();
        $this->data['session'] = \Config\Services::session();
        $this->data['page_title'] = "Obat";
    }
    public function index()
    {
        //
    }
    public function login()
    {
        return view('login/login');
    }
    public function register()
    {
        return view('login/register');
    }
    public function dashboard()
    {
        $this->data['products'] = $this->model->select('master_product.id as id, name_eskrim, harga, upload_foto, deskripsi')->orderBy('id', 'asc')->findAll();
        return view('dashboard/index', $this->data);

    }
}
