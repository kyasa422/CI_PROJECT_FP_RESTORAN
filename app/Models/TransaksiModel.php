<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'transaksi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id','id_product', 'jumlah', 'buyer', 'id_user'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getProduct($id = false)
    {
        if ($id == false) {
            $this->select('transaksi.*,master_product.name_eskrim,master_product.harga as harga,master_user.username');
            $this->join('master_product', 'master_product.id = id_product');
            $this->join('master_user', 'master_user.id = id_user');
          
  

            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

}


