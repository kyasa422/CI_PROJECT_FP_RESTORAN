<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Dompdf\Dompdf;
use App\Models\TransaksiModel;
use CodeIgniter\I18n\Time;



class TransaksiController extends BaseController
{

    protected $data;
    protected $model, $session, $TransaksiModel;




    public function __construct()
    {
        $this->model = new TransaksiModel();
        $this->data['session'] = \Config\Services::session();
        $this->data['page_title'] = "detail transaksi";

        

    }

    public function history()
    {
        //
 
        $this->data['transaksi'] = $this->model->select('transaksi.id as id, jumlah, master_product.harga as harga, buyer,username')->join('master_product', 'master_product.id = transaksi.id_product', 'master_user.username = transaksi.username')->orderBy('id', 'asc')->findAll();
 
        return view('/transaksi/history', $this->data);
    }
    public function printpdf(){
        
        $this->data['transaksi'] = $this->model->select('transaksi.id as id, jumlah, master_product.harga as harga, buyer')->join('master_product', 'master_product.id = transaksi.id_product')->orderBy('id', 'asc')->findAll();
        $dompdf = new Dompdf();
        $html = view('transaksi/history', $this->data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }

    public function destroy($id)
    {
        $product = $this->model->find($id);

        $this->model->delete($id);
        session()->setFlashdata('delete', 'Berhasil hapus data');
        return redirect()->to(base_url('/transaksi/history'));
    }
}