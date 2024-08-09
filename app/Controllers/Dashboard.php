<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Controllers\getPost;

class Dashboard extends BaseController
{
    public function index(): string
    {
        $transaksiModel = new TransaksiModel();
        $data['transaksi'] = $transaksiModel->join('customer', 'transaksi.customer_id = customer.customer_id')->where('status !=', 2)->orderBy('transaksi.transaksi_id', 'DESC')->findAll();
        // dd($transaksi);
        return view('frontend/table', $data);
    }

    public function detail(): string
    {
        $transaksi = new TransaksiModel();
        $data['transaksi'] = $transaksi->join('customer', 'transaksi.customer_id = customer.customer_id')->join('detail_transaksi', 'transaksi.transaksi_id = detail_transaksi.transaksi_id')->findAll();
        dd($transaksi);
    }
}
