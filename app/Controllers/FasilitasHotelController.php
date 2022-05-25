<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FasilitasHotel;
use App\Models\Petugas;

class FasilitasHotelController extends BaseController
{
    public function index()
    {
        return view('login');
    }
    //login
    public function login()
    {
        helper(['form']);
        $aturan = [
            'txtUsername' => 'required',
            'txtPassword' => 'required'
        ];
        if ($this->validate($aturan)) {
            $Datapetugas = new Petugas();
            $syarat = ['username' => $this->request->getPost('txtUsername'), 'password' => md5($this->request->getPost('txtPassword'))];
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
    //logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/petugas');
    }
    //tampil
    public function tampilFasilitasHotel()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ? 
        if (session()->get('level') != 'admin') {
            return redirect()->to('/fasilitashotel/dashboard');
            exit;
        }
        $Datafasilitashotel = new fasilitashotel;
        $data['ListFasilitasHotel'] = $this->fasilitashotel->findAll();
        return view('/fasilitashotel/tampil-fasilitashotel', $data);
    }
    //tambah
    public function tambahFasilitasHotel()
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
        return view('FasilitasHotel/tambah-fasilitashotel');
    }
    //simpan
    public function simpanFasilitasHotel()
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
        helper(['from']);
        $upload = $this->request->getFile('txtInputFoto');
        $upload->move(WRITEPATH . '../public/gambar/');
        $datanya = [
            'nama_fasilitas' => $this->request->getPost('txtInputNamaFasilitas'),
            'deskripsi' => $this->request->getPost('txtInputDeskripsi'),
            'foto' => $upload->getName()
        ];
        $this->fasilitashotel->insert($datanya);
        return redirect()->to('/fasilitashotel/tampil')->with('berhasil', 'Data Berhasil di simpan');
    }
    public function editFasilitasHotel($idfasilitashotel)
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
        $data['detailfasilitashotel'] = $this->fasilitashotel->where('id_fasilitas_hotel', $idfasilitashotel)->findAll();
        return view('/fasilitashotel/edit-fasilitashotel', $data);
    }
    //UPDATE
    public function updateFasilitasHotel()
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
        $data = [
            'nama_fasilitas' => $this->request->getPost('txtInputNamaFasilitas'),
            'deskripsi' => $this->request->getPost('txtInputDeskripsi'),
        ];
        $this->fasilitashotel->update($this->request->getPost('txtIdFasilitasHotel'), $data);
        return redirect()->to('/fasilitashotel/tampil')->with('berhasil', 'Data Berhasil di Update');
    }
    public function editFoto($idfasilitashotel)
    {
        $data['detailfasilitashotel'] = $this->fasilitashotel->where('id_fasilitas_hotel', $idfasilitashotel)->findAll();
        return view('/fasilitashotel/update-foto', $data);
    }
    public function hapusFasilitasHotel($idfasilitashotel)
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
        $syarat = ['id_fasilitas_hotel' => $idfasilitashotel];
        $infofile = $this->fasilitashotel->where($syarat)->find();
        //hapus data didatabase
        $this->fasilitashotel->where('id_fasilitas_hotel', $idfasilitashotel)->delete();
        return redirect()->to('/fasilitashotel/tampil')->with('berhasil', 'Data Berhasil di Hapus');
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
        $upload = $this->request->getFile('txtFoto');
        $upload->move(WRITEPATH . '../public/gambar/');
        $data = [
            'foto' => $upload->getName()
        ];
        $this->fasilitashotel->update($this->request->getPost('txtIdFasilitasHotel'), $data);
        return redirect()->to('/fasilitashotel/tampil')->with('berhasil', 'Data Berhasil di Update');
    }
}
