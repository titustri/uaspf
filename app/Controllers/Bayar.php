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

    public function bayar(): string
    {
        $id = intval($this->request->getPost('id'));
        $transaksi = new TransaksiModel;
        $transaksi->where('transaksi_id',$id)->set([
            "status" => 1
        ])->update();

        return view('frontend/transaksiselesai');
    }
}
