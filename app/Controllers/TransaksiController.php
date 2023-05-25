<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\TransaksiModel;
use CodeIgniter\I18n\Time;



class ProductController extends BaseController
{

    protected $data;
    protected $model, $session, $TransaksiModel;




    public function __construct()
    {
        $this->model = new ProductModel();
        $this->data['session'] = \Config\Services::session();
        $this->data['page_title'] = "Product";

        $this->TransaksiModel = new TransaksiModel();

    }

    public function history()
    {
        //
        $this->data['page_title'] = "Product";

        $this->data['products'] = $this->model->select('transaksi.id as id, jumlah, buyer')->orderBy('id', 'asc')->findAll();
        return view('/transaksi/history_transaksi', $this->data);
    }
}