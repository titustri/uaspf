<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\Detail_transaksiModel;
use App\Models\TransaksiModel;
use App\Models\CustomerModel;
use App\Controllers\getPost;

class Transaksi extends BaseController
{
    protected $barang;
    protected $transaksi;
    protected $detailTransaksi;

    public function __construct()
    {
        $this->barang = new BarangModel();
        $this->transaksi = new TransaksiModel();
        $this->detailTransaksi = new Detail_transaksiModel();
        $this->customer = new CustomerModel();
    }

    public function index(): string
    {
        // Get Data detail transaksi
        
        $data['detail_transaksi'] = $this->detailTransaksi->join('transaksi', 'detail_transaksi.transaksi_id = transaksi.transaksi_id')->join('barang', 'detail_transaksi.barang_id = barang.barang_id')->where('transaksi.status', 0)->findAll();
        // dd($data['detail_transaksi']);
        // Gete Data transaksi
        
        $data['transaksi'] = $this->transaksi->where('status', 0)->findAll();
        $data['condition'] = $this->transaksi->where('status', 0)->builder()->countAllResults();

        // dd($data['condition']);
        if($data['condition'] == 0){
            $this->transaksi->insert([
                "customer_id" => 1,
                "total_transaksi" => 0,
                "status" => 0
            ]);
        }
        $idTransaksi = $this->transaksi->builder()->select('transaksi_id')->orderBy('transaksi_id','DESC')->limit(1)->get()->getResultArray();
        $data['transaksi_id'] = intval($idTransaksi[0]['transaksi_id']);
        $totalTransaksi = $this->transaksi->select('total_transaksi')->where('transaksi_id',$data['transaksi_id'])->findAll();
        $data['total_transaksi'] = intval($totalTransaksi[0]['total_transaksi']);

        // dd($data['transaksi_id']);
        return view('frontend/listtotalbarang', $data);
    }
    public function barang(): string
    {
        // Get Data barang
        
        $data['barang'] = $this->barang->findAll();
        return view('frontend/listbarang', $data);
    }

    public function tambah(): string
    {
        // Get data detail transaks
        $data['transaksi'] = $this->transaksi->where('status', 0)->findAll();
        $this->transaksiid = $this->transaksi->where('status', 0)->select('transaksi_id')->findAll();
        $data['transaksi_id'] = intval($this->transaksiid[0]["transaksi_id"]);

        $harga = $this->barang->where('barang_id', $this->request->getPost('barangid'))->select('harga')->find(); 
        $totalHarga = intval($harga[0]["harga"]) * $this->request->getPost('jumlah');
        // dd(intval($data['transaksi_id'][0]["transaksi_id"]));
        
        $this->detailTransaksi->insert([
            "transaksi_id" => $data['transaksi_id'],
            "barang_id" => $this->request->getPost('barangid'),
            "jumlah_satuan" => $this->request->getPost('jumlah'),
            "total_harga" => $totalHarga
        ]);

        $totalTransaksi = $this->detailTransaksi->where('transaksi_id',$data['transaksi_id'])->builder()->selectsum('total_harga')->get()->getResultArray();
        $intTotalTransaksi = $totalTransaksi[0]["total_harga"];
        // dd($intTotalTransaksi);
        
        $this->transaksi->where('transaksi_id',$data['transaksi_id'])->set([
            "total_transaksi" => $intTotalTransaksi,
        ])->update();

        $data['total_transaksi'] = intval($intTotalTransaksi);
        $data['detail_transaksi'] = $this->detailTransaksi->join('transaksi', 'detail_transaksi.transaksi_id = transaksi.transaksi_id')->join('barang', 'detail_transaksi.barang_id = barang.barang_id')->where('transaksi.status', 0)->findAll();
        return view('frontend/listtotalbarang', $data);
    }

    public function cancel($id) 
    {
        // $id = intval($this->request->getPost('id'));
        // dd($id);
        
        $this->transaksi->builder()->where('transaksi_id', $id)->delete();
        return redirect()->to('dashboard');
    }

    public function detail($id): string
    {
        $data['transaksi'] = $this->transaksi->where('transaksi_id', $id)->first();
        $data['detail_transaksi'] = $this->detailTransaksi->join('barang', 'detail_transaksi.barang_id = barang.barang_id')->where('transaksi_id', $id)->findAll();
        $data['customer'] = $this->customer->where('customer_id', $data['transaksi']['customer_id'])->first();

        return view('frontend/detail-transaksi', $data);
    }

    public function cek_member()
    {
        $valid = false;
        $member = [];
        $data['member'] = $this->customer->where('nama_customer', $this->request->getPost('member'))->first();
        if($data['member']){
            $valid = true;
            $member = ['id'=>$data['member']['customer_id'], 'nama'=>$data['member']['nama_customer']];
        }

        return $this->response->setJSON(['success' => true, 'valid' => $valid, 'member' => $member]);
    }

    public function hapus($id)
    {
        $this->transaksi->where('transaksi_id',$id)->set([
            "status" => 2,
        ])->update();
        return redirect()->to('dashboard');
    }

}
