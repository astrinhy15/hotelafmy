<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['tipe_kamar'] = $this->tipekamar->findAll();
        $data['fasilitas_hotel'] = $this->fasilitashotel->findAll();
        $data['fasilitas_kamar'] = $this->fasilitas->findAll();

        $data['tipe_kamar'] = array_map(function ($tipe_kamar) {

            $tipe_kamar['fasilitas'] = $this->fasilitas
                ->where(['id_tipe_kamar' => $tipe_kamar['id_tipe_kamar']])
                ->find();

            return $tipe_kamar;
        }, $data['tipe_kamar']);

        return view('beranda', $data);
    }

    public function kamar()
    {
        $this->kamar->join('fasilitas_kamar', 'fasilitas_kamar.id_fasilitas_kamar=tbl_kamar.id_kamar');
        $data['listkamar'] = $this->kamar->findAll();
        return view('Kamar/tampil-kamar', $data);
    }
}
