<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $useTimestamps = true;
    protected $allowedFields = ["transaksi_id","customer_id","total_transaksi","status"];

}