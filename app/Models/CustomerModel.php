<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $useTimestamps = true;
    protected $allowedFields = ["customer_id", "nama_customer", "no_telp", "tanggal_daftar"];
}