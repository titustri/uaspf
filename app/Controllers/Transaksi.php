<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\Detail_transaksiModel;
use App\Models\TransaksiModel;
use App\Controllers\getPost;

class Transaksi extends BaseController
{
    public function index(): string
    {
        // Get Data detail transaksi
        $detailTransaksi = new Detail_transaksiModel();
        $data['detail_transaksi'] = $detailTransaksi->join('transaksi', 'detail_transaksi.transaksi_id = transaksi.transaksi_id')->join('barang', 'detail_transaksi.barang_id = barang.barang_id')->where('transaksi.status', 0)->findAll();

        // Gete Data transaksi
        $transaksi = new TransaksiModel();
        $data['transaksi'] = $transaksi->where('status', 0)->findAll();
        return view('frontend/listtotalbarang', $data);
    }
    public function barang(): string
    {
        // Get Data barang
        $barang = new BarangModel();
        $data['barang'] = $barang->findAll();
        return view('frontend/listbarang', $data);
    }

    public function tambah(): string
    {
        // Get data detail transaksi
        $detailTransaksi = new Detail_transaksiModel();
        $data['detail_transaksi'] = $detailTransaksi->join('transaksi', 'detail_transaksi.transaksi_id = transaksi.transaksi_id')->join('barang', 'detail_transaksi.barang_id = barang.barang_id')->where('transaksi.status', 0)->findAll();
        $transaksi = new TransaksiModel();
        $data['transaksi'] = $transaksi->where('status', 0)->findAll();

        // Check & create existing transaksi
        // $transaksi = new TransaksiModel();
        // $check = $transaksi->where('status', 1)->countAllResult();
        // dd($check);

        // Insert data detail transaksi
        $barang = $this->request->getPost('barangid');
        return view('frontend/listtotalbarang', $data);
    }
}
