<?php

namespace App\Models;

use CodeIgniter\Model;

class Detail_transaksiModel extends Model
{
    protected $table = 'detail_transaksi';
    protected $useTimestamps = true;
    protected $allowedFields = ["transaksi_id","barang_id","jumlah_satuan","total_harga"];
}