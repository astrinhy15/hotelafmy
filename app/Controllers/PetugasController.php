<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kamar;
use App\Models\Petugas;
use App\Models\TipeKamar;

class PetugasController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $Datapetugas = new Petugas;
        $syarat = [
            'username' => $this->request->getPost('txtUsername'),
            'password' => md5($this->request->getPost('txtPassword'))
        ];
        $Userpetugas = $Datapetugas->where($syarat)->find();
        if (count($Userpetugas) == 1) {
            $session_data = [
                'username' => $Userpetugas[0]['username'],
                'id_petugas' => $Userpetugas[0]['id_petugas'],
                'level' => $Userpetugas[0]['level'],
                'sudahkahLogin' => TRUE
            ];
            session()->set($session_data);
            return redirect()->to('/petugas/dashboard');
        } else {
            return redirect()->to('/petugas');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/petugas');
    }

    public function tampilkamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        $DataKamar = new Kamar;
        $data['ListKamar'] = $DataKamar
            ->select('tbl_kamar.*, nama_tipe_kamar')
            ->join('tipe_kamar', 'tipe_kamar.id_tipe_kamar = tbl_kamar.id_tipe_kamar')
            ->findAll();
        return view('Kamar/tampil-kamar', $data);
    }

    public function tambahKamar()
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
        $tipekamar = new TipeKamar();
        $data['tipe_kamar'] = $tipekamar->findAll();
        return view('Kamar/tambah-kamar', $data);
    }

    public function simpanKamar()
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
        $Datakamar = new Kamar;
        $datanya = [
            'no_kamar' => $this->request->getPost('txtNoKamar'),
            'id_tipe_kamar' => $this->request->getPost('txtInputTipeKamar'),
            // 'status' => $this->request->getPost('txtInputStatus'),
        ];
        $Datakamar->insert($datanya);
        return redirect()->to('/kamar')->with('berhasil', 'Data Berhasil di tambah');
    }

    public function editKamar($idkamar)
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
        $data['detailKamar'] = $this->kamar->where('id_kamar', $idkamar)->findAll();
        $data['datatipekamar'] = $this->tipekamar->findAll();
        return view('Kamar/edit-kamar', $data);
    }

    public function updateKamar()
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
        $Datakamar = new Kamar;
        $datanya = [
            'no_kamar' => $this->request->getPost('txtNoKamar'),
            'id_tipe_kamar' => $this->request->getPost('txtInputTipeKamar'),
            'jml_kamar_tersedia' => $this->request->getPost('txtInputJmlKamar'),
        ];
        $Datakamar->update($this->request->getPost('txtNoKamar'), $datanya);
        return redirect()->to('/kamar')->with('berhasil', 'Data Berhasil di Update');
    }

    public function editFoto($idkamar)
    {
        $data['detailKamar'] = $this->kamar->where('id_kamar', $idkamar)->findAll();
        return view('Kamar/update-foto', $data);
    }

    public function updateFoto()
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
        $kamar = new Kamar();
        $idkamar = $this->request->getPost('txtIdKamar');
        helper(['form']);
        $upload = $this->request->getFile('txtFoto');
        $upload->move(WRITEPATH . '../public/gambar/');
        $data = [
            'foto' => $upload->getName()
        ];
        $kamar->update($idkamar, $data);
        return redirect()->to('/kamar/updatefoto')->with('berhasil', 'Data Berhasil di Update');
    }

    public function hapusKamar($idkamar)
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
        $this->kamar->where('id_kamar', $idkamar)->delete();
        return redirect()->to('/kamar')->with('berhasil', 'Data Berhasil di Hapus');
    }
}
