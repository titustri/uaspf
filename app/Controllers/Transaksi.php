<?php

namespace App\Controllers;

class Transaksi extends BaseController
{
    public function index(): string
    {
        return view('frontend/listtotalbarang');
    }
    public function barang(): string
    {
        return view('frontend/listbarang');
    }
}
