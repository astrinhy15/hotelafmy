<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Session\Session;
use PhpParser\Node\Expr\Cast\Array_;

class ReservasiController extends BaseController
{
    public function index()
    {
        $currentPage = $this->request->getVar('page_reservasi') ? $this->request->getVar('page_reservasi') : 1;

        //d($this->request->getVar('keyword'));

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $datatamu = $this->reservasi->search($keyword);
        } else {
            $datatamu = $this->reservasi;
        }

        $data = [
            'title' => 'Berikut ini daftar Tamu yang sudah terdaftar dalam database.',
            'tamu' => $datatamu->paginate(10, 'reservasi'),
            'pager' => $this->reservasi->pager,
            'currentPage' => $currentPage
        ];
        return view('resepsionis/tampil_reservasi', $data);
    }
    public function in($id_reservasi)
    {
        $datanya = ['status' => ['chek in']];
        $this->reservasi->update($id_reservasi, $datanya);
        return redirect()->to(site_url('/reservasi/tampilreservasi'))->with('berhasil', 'Data berhasil diupdate');
    }

    public function out($id_reservasi)
    {
        $datanya = ['status' => ['chek out']];
        session()->setFlashdata('kembali', '/reservasi/tampilreservasi');
        $this->reservasi->update($id_reservasi, $datanya);
        return redirect()->to(site_url('/inv/' . $id_reservasi))->with('berhasil', 'Data berhasil diupdate');
    }

    public function tampil_reservasi()
    {
        if ($keyword = $this->request->getGet('keyword')) {
            $this->reservasi->orWhere('cek-in', $keyword)
                ->orWhere('nama_tamu', $keyword);
        }
        $data['Listreservasi'] = $this->reservasi->findAll();
        return view('resepsionis/tampil_reservasi', $data);
    }

    public function invoice($id_reservasi)
    {
        $reservasi = $this->reservasi
            ->select('reservasi.*, nama_tipe_kamar, tipe_kamar.harga AS harga_tipe_kamar')
            ->join('tipe_kamar', 'reservasi.id_tipe_kamar = tipe_kamar.id_tipe_kamar')
            ->find($id_reservasi);
        $data['reservasi'] = $reservasi;

        $ckin = strtotime($reservasi['cek-in']);
        $ckout = strtotime($reservasi['cek-out']);
        $data['jml_hari'] = ($ckout - $ckin) / 60 / 60 / 24;

        $data['harga_permalam'] = $reservasi['jumlah_kamar'] * $reservasi['harga_tipe_kamar'];
        return view('invoice', $data);
    }

    public function hapusreservasi($id_reservasi)
    {
        $syarat = ['id_reservasi' => $id_reservasi];
        $infofile = $this->reservasi->where($syarat)->find();
        //hapus data didatabase
        $this->reservasi->where('id_reservasi', $id_reservasi)->delete();
        return redirect()->to('/reservasi/tampilreservasi')->with('berhasil', 'Data Berhasil dibatalkan');
    }
}
