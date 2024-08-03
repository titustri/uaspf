<?php

namespace App\Controllers;

use App\Models\TransaksiModel;

class Dashboard extends BaseController
{
    public function index(): string
    {
        $transaksiModel = new TransaksiModel();
        $data['transaksi'] = $transaksiModel->join('customer', 'transaksi.customer_id = customer.customer_id')->join('detail_transaksi', 'transaksi.transaksi_id = detail_transaksi.transaksi_id')->findAll();
        // dd($transaksi);
        return view('frontend/table', $data);
    }
}
