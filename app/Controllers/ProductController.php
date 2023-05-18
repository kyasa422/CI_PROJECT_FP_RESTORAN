<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use CodeIgniter\I18n\Time;



class ProductController extends BaseController
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
        $this->data['page_title'] = "Product";

        $this->data['products'] = $this->model->select('master_product.id as id, name_eskrim, harga, upload_foto, deskripsi')->orderBy('id', 'asc')->findAll();
        return view('product/index', $this->data);
    }

    public function create()
    {
        $this->data['page_title'] = "Add Product";


        return view('product/create', $this->data);
    }

    public function store()
    {
        $dataInput = $this->request->getVar();
        // dd($dataInput);
        $filterData = [
            "name_eskrim" => esc($dataInput['name_eskrim']),
            "harga" => esc($dataInput["harga"]),
            "deskripsi" => esc($dataInput['deskripsi']),
        ];



        $rulesSet = [
            "name_eskrim" => [
                "rules" => "required|is_unique[master_product.name_eskrim]",
                "errors" => [
                    "required" => "Harap isi nama produk terlebih dahulu",
                    "is_unique" => "Nama produk sudah terdaftar",
                ]
            ],
            "harga" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Harap isi jenis barang terlebih dahulu"
                ]
            ],
            "upload_foto" => [
                "rules" => "uploaded[upload_foto]|max_size[upload_foto,2048]|mime_in[upload_foto,image/png,image/jpg,image/jpeg]",
                "errors" => [
                    "uploaded" => "Harap cantumkan foto  terlebih dahulu",
                    "max_size" => "Ukuran maks. foto barang 2 MB",
                    "mime_in" => "Format foto barang hanya dalam bentuk png, jpg, dan jpeg",
                ]
            ],
            "deskripsi" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Harap isi {field} terlebih dahulu"
                ]
            ],

        ];

        // dd($this->validate($rulesSet));
        if (!$this->validate($rulesSet)) {
            return redirect()->to(base_url('/product/create'))->withInput();
        }

        $time = Time::now('America/Chicago', 'en_US');
        $foto = $this->request->getFile('upload_foto');
        $namaFile = $filterData['name_eskrim'] . "_" . $time->timestamp . "_" . $foto->getName();
        $foto->move('img/uploads', $namaFile);
        $filterData['upload_foto'] = $namaFile;

        // Insert ke db
        $this->model->insert($filterData);
        session()->setFlashdata('add', 'Berhasil tambah data');
        return redirect()->to(base_url('/dashboard'));
    }

    public function edit($id)
    {

        $this->data['page_title'] = "Edit Product";
        $this->data['menu'] = "obat";
        $this->data['product'] = $this->model->where('id', $id)->first();
        $this->data['categories'] = $this->jenis->findAll();
        return view('obat/update', $this->data);
    }

    public function update()
    {
        $dataInput = $this->request->getVar();
        $existData = $this->model->where('id', $dataInput['id_product'])->first();
        // dd($dataInput);
        $filterData = [
            "nama_barang" => esc($dataInput['nama_barang']),
            "jenis_barang" => esc($dataInput["jenis_barang"]),
            "kuantitas" => esc($dataInput['kuantitas']),
            "harga_satuan" => esc($dataInput['harga_satuan']),
        ];



        $rulesSet = [
            "nama_barang" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Harap isi nama produk terlebih dahulu",
                ]
            ],
            "jenis_barang" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Harap isi jenis barang terlebih dahulu"
                ]
            ],
            "kuantitas" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Harap isi {field} terlebih dahulu"
                ]
            ],
            "harga_satuan" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Harap isi harga satuan terlebih dahulu",
                ]
            ],
            "foto_barang" => [
                "rules" => "max_size[foto_barang,2048]|mime_in[foto_barang,image/png,image/jpg,image/jpeg]",
                "errors" => [
                    "max_size" => "Ukuran maks. foto barang 2 MB",
                    "mime_in" => "Format foto barang hanya dalam bentuk png, jpg, dan jpeg",
                ]
            ],
        ];

        if ($filterData['nama_barang'] != $existData['nama_barang']) {
            $rulesSet['nama_barang']['rules'] = 'required|is_unique[master_barang.nama_barang]';
            $rulesSet['nama_barang']['errors'] = [
                "required" => "Harap isi nama produk terlebih dahulu",
                "is_unique" => "Nama produk sudah terdaftar",
            ];
        }



        // dd($this->validate($rulesSet));
        if (!$this->validate($rulesSet)) {
            return redirect()->to(base_url('/obat/update' . $dataInput['id_product']))->withInput();
        }

        $foto = $this->request->getFile('foto_barang');
        // dd($foto->getExtension());
        if ($foto->getError() != 4) {
            // Hapus foto yang sudah ada
            unlink("img/uploads/" . $existData['foto_barang']);

            // Tambahkan foto yang baru
            $time = Time::now('America/Chicago', 'en_US');
            $namaFile = $filterData['nama_barang'] . "_" . $time->timestamp . "." . $foto->getExtension();
            $foto->move('img/uploads', $namaFile);
            $filterData['foto_barang'] = $namaFile;
        }

        // Insert ke db
        $this->model->update($dataInput['id_product'], $filterData);
        session()->setFlashdata('update', 'Berhasil perbarui data');
        return redirect()->to(base_url('/obat'));
    }


    public function destroy($id)
    {
        $product = $this->model->find($id);
        unlink("img/uploads/" . $product['upload_foto']);
        $this->model->delete($id);
        session()->setFlashdata('delete', 'Berhasil hapus data');
        return redirect()->to(base_url('/dashboard'));
    }
}
