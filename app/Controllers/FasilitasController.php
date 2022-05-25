<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Fasilitas;
use App\Models\Petugas;
use App\Models\TipeKamar;

class FasilitasController extends BaseController
{
    public function index()
    {
        return view('login');
    }
    public function login()
    {
        helper(['form']);
        $aturan = [
            'txtUsername' => 'required',
            'txtPassword' => 'required'
        ];
        if ($this->validate($aturan)) {
            $Datapetugas = new Petugas();
            $syarat = [
                'username' =>
                $this->request->getPost('txtUsername'),
                'password' =>
                md5($this->request->getPost('txtPassword'))
            ];
            $Userpetugas =
                $Datapetugas->where($syarat)->find();
            if (count($Userpetugas) == 1) {
                $session_data = [
                    'username' => $Userpetugas[0]['username'],
                    'level' => $Userpetugas[0]['level'],
                    'sudahkahLogin' => TRUE
                ];
                session()->set($session_data);
                return redirect()->to('/petugas/dashboard');
            } else {
                return redirect()->to('/petugas');
            }
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/petugas');
    }

    public function tampilFasilitas()
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
        $data['ListFasilitas'] = $this->fasilitas->findAll();
        return view('Fasilitas/tampil-fasilitaskamar', $data);
    }

    public function tambahFasilitas()
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
        $data['tipe_kamar'] = $this->tipekamar->findAll();
        return view('Fasilitas/tambah-fasilitaskamar', $data);
    }
    public function simpanFasilitas()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('Petugas/simpan-kamar');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $datanya = [
            'id_tipe_kamar' => $this->request->getPost('txtInputIdTipeKamar'),
            'nama_fasilitas' => $this->request->getPost('txtInputNamaFasilitas'),
        ];
        $this->fasilitas->insert($datanya);
        return redirect()->to('/fasilitas/tampil')->with('berhasil', 'Data Berhasil di simpan');;
    }

    public function editfasilitas($idfasilitas)
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
        $data['detailfasilitas'] = $this->fasilitas->where('id_fasilitas_kamar', $idfasilitas)->findAll();
        return view('fasilitas/edit-fasilitaskamar', $data);
    }
    //UPDATE
    public function updateFasilitas()
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
        $data = [
            'id_tipe_kamar' => $this->request->getPost('txtInputTipeKamar'),
            'nama_fasilitas' => $this->request->getPost('txtInputNamaFasilitas'),
        ];
        $this->fasilitas->update($this->request->getPost('txtIdFasilitasKamar'), $data);
        return redirect()->to('/fasilitas/tampil')->with('berhasil', 'Data Berhasil di Update');
    }
    public function hapusFasilitas($idfasilitas)
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
        $this->fasilitas->where('id_fasilitas_kamar', $idfasilitas)->delete();
        return redirect()->to('/fasilitas/tampil')->with('berhasil', 'Data Berhasil di Hapus');
    }
}
