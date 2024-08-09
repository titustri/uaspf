<?php

namespace App\Controllers;
use App\Models\TransaksiModel;
use App\Controllers\getPost;

class Bayar extends BaseController
{
    public function index(): string
    {
        return view('frontend/transaksiselesai');
    }

    public function bayar($id, $customer = 1): string
    {
        $transaksi = new TransaksiModel;
        $transaksi->where('transaksi_id',$id)->set([
            "status" => 1,
            "customer_id" => $customer,
        ])->update();

        return view('frontend/transaksiselesai');
    }
}
