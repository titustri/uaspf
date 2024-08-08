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
        // dd($data['detail_transaksi']);
        // Gete Data transaksi
        $transaksi = new TransaksiModel();
        $data['transaksi'] = $transaksi->where('status', 0)->findAll();
        $data['condition'] = $transaksi->where('status', 0)->builder()->countAllResults();

        // dd($data['condition']);
        if($data['condition'] == 0){
            $transaksi->insert([
                "customer_id" => 1,
                "total_transaksi" => 0,
                "status" => 0
            ]);
        }
        $idTransaksi = $transaksi->builder()->select('transaksi_id')->orderBy('transaksi_id','DESC')->limit(1)->get()->getResultArray();
        $data['transaksi_id'] = intval($idTransaksi[0]['transaksi_id']);
        $totalTransaksi = $transaksi->select('total_transaksi')->where('transaksi_id',$data['transaksi_id'])->findAll();
        $data['total_transaksi'] = intval($totalTransaksi[0]['total_transaksi']);

        // dd($data['transaksi_id']);
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
        $transaksi = new TransaksiModel();
        $barang = new BarangModel();

        $data['transaksi'] = $transaksi->where('status', 0)->findAll();
        $transaksiid = $transaksi->where('status', 0)->select('transaksi_id')->findAll();
        $data['transaksi_id'] = intval($transaksiid[0]["transaksi_id"]);

        $harga = $barang->where('barang_id', $this->request->getPost('barangid'))->select('harga')->find(); 
        $totalHarga = intval($harga[0]["harga"]) * $this->request->getPost('jumlah');
        // dd(intval($data['transaksi_id'][0]["transaksi_id"]));
        
        $detailTransaksi->insert([
            "transaksi_id" => $data['transaksi_id'],
            "barang_id" => $this->request->getPost('barangid'),
            "jumlah_satuan" => $this->request->getPost('jumlah'),
            "total_harga" => $totalHarga
        ]);

        $totalTransaksi = $detailTransaksi->where('transaksi_id',$data['transaksi_id'])->builder()->selectsum('total_harga')->get()->getResultArray();
        $intTotalTransaksi = $totalTransaksi[0]["total_harga"];
        // dd($intTotalTransaksi);
        
        $transaksi->where('transaksi_id',$data['transaksi_id'])->set([
            "total_transaksi" => $intTotalTransaksi,
        ])->update();

        $data['total_transaksi'] = intval($intTotalTransaksi);
        $data['detail_transaksi'] = $detailTransaksi->join('transaksi', 'detail_transaksi.transaksi_id = transaksi.transaksi_id')->join('barang', 'detail_transaksi.barang_id = barang.barang_id')->where('transaksi.status', 0)->findAll();
        return view('frontend/listtotalbarang', $data);
    }

    public function cancel() 
    {
        $id = intval($this->request->getPost('id'));
        // dd($id);
        $transaksi = new TransaksiModel();
        $transaksi->builder()->where('transaksi_id', $id)->delete();
        return redirect()->to('dashboard');
    }
}
