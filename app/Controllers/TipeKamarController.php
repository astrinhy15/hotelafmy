<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TipeKamar;

class TipeKamarController extends BaseController
{
    public function tampilTipeKamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        $data['datatipekamar'] = $this->tipekamar->findAll();
        return view('TipeKamar/tampil-tipekamar', $data);
    }

    public function tambahTipeKamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        return view('TipeKamar/tambah-tipekamar');
    }

    public function simpanTipeKamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('tipe-kamar/simpan');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $Datatipekamar = new TipeKamar();
        helper(['from']);
        $upload = $this->request->getFile('txtInputFoto');
        $upload->move(WRITEPATH . '../public/gambar/');
        $datanya = [
            'nama_tipe_kamar' => $this->request->getPost('txtNamaTipeKamar'),
            'harga' => $this->request->getPost('txtHargaKamar'),
            'deskripsi' => $this->request->getPost('txtInputDeskripsi'),
            'foto' => $upload->getName()
        ];
        $Datatipekamar->insert($datanya);
        return redirect()->to('/tipe-kamar/tampil')->with('berhasil', 'Data Berhasil di tambah');
    }
    public function hapusTipeKamar($idtipekamar)
    {
        // cek apakah sudah login
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $Datatipekamar = new TipeKamar;
        $Datatipekamar->where('id_tipe_kamar', $idtipekamar)->delete();
        return redirect()->to('/tipe-kamar/tampil')->with('berhasil', 'Data Berhasil di Hapus');
    }
    public function updateTipeKamar()
    {
        //cek apakah sudah login
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $Datatipekamar = new TipeKamar;
        $datanya = [
            'nama_tipe_kamar' => $this->request->getPost('txtNamaTipeKamar'),
            'harga' => $this->request->getPost('txtHargaKamar'),
            'deskripsi' => $this->request->getPost('txtInputDeskripsi'),
        ];
        $Datatipekamar->update($this->request->getPost('txtIdTipeKamar'), $datanya);
        return redirect()->to('/tipe-kamar/tampil')->with('berhasil', 'Data Berhasil di Update');
    }
    public function editTipeKamar($idtipekamar)
    {
        // cek apakah sudah login ?
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $Datatipekamar['datatipekamar'] = $this->tipekamar->where('id_tipe_kamar', $idtipekamar)->findAll();
        return view('/tipekamar/edit-tipekamar', $Datatipekamar);
    }

    public function editFoto($idtipekamar)
    {
        $Datatipekamar['datatipekamar'] = $this->tipekamar->where('id_tipe_kamar', $idtipekamar)->findAll();
        return view('/tipekamar/update-foto', $Datatipekamar);
    }

    public function updateFoto()
    {
        //cek apakah sudah login
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        helper(['from']);
        $upload = $this->request->getFile('txtInputFoto');
        $upload->move(WRITEPATH . '../public/gambar/');
        $Datatipekamar = [
            'foto' => $upload->getName()
        ];
        $this->tipekamar->update($this->request->getPost('txtIdTipeKamar'), $Datatipekamar);
        return redirect()->to('/tipe-kamar/tampil')->with('berhasil', 'Data Berhasil di Update');
    }



    // public function percobaan($umur, $nama)
    // {
    //     echo "nama saya {$nama}. umur saya {$umur} tahun.";
    // }
}
