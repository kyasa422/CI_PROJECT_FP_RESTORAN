<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\TransaksiModel;
use CodeIgniter\I18n\Time;

class UserController extends BaseController
{
    protected $data;
    protected $model, $session;
    protected $productModel;
    protected $transaksiModel;
    public function __construct()
    {
        $this->model = new ProductModel();
        $this->data['session'] = \Config\Services::session();
        $this->data['page_title'] = "product";

        $this->productModel = new ProductModel();
        $this->session = \Config\Services::session();

        $this->transaksiModel = new TransaksiModel();
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
        $this->data['products'] = $this->model->select('master_product.id as id, name_eskrim, harga,upload_foto, deskripsi')->orderBy('id', 'asc')->findAll();
        return view('dashboard/index', $this->data);
    }
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }






    public function create($id)
    {
        $data = [
            'title' => 'Pembelian',
            'product' => $this->productModel->getProduct($id),
        ];
        return view('/transaksi/index', $data);
    }






    public function save()
    {
        if (!$this->validate([
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'pembeli' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],

        ])) {
            return redirect()->back()->withInput();
        }

        $id_product = $this->request->getVar('id');
        $pembeli = $this->request->getVar('pembeli');
        $jumlah_product = $this->request->getVar('jumlah');
        $id_user = $this->request->getVar('id_user');

        // $quantity_product = $this->productModel->updateQuantity($id_product);

        // //pengecekan apabila jumlah pembelian melebihi stock
        // if ($quantity_product['jumlah'] - $jumlah_product < 0) {
        //     session()->setFlashdata('pesan', 'Jumlah pembelian melebihi stock');
        //     return redirect()->back()->withInput();
        // } else {
        //     $pengurangan_stok = $quantity_product['jumlah'] - $jumlah_product;
        // }

        $this->transaksiModel->save([
            'id_product' => $id_product,
            'jumlah' => $jumlah_product,
            'buyer' => $pembeli,
            'id_user' =>  session()->get('user_id'),

        ]);

        // $this->productModel->save([
        //     'id' => $id_product,
        //     'jumlah' => $pengurangan_stok
        // ]);

        session()->setFlashdata('pesan', 'Produk berhasil dipesan');

        return redirect()->to('/dashboard');
    }
}
