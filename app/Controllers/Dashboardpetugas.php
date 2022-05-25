<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboardpetugas extends BaseController
{
    public function index()
    {
        $data['intro'] = '<div class="jumbotron mt-5">
		<h1>Hii! ' . session()->get('level') . '</h1>
		<p>Silahkan gunakan halaman ini untuk menampilkan informasi Hotel Afmy!</p>
	  </div>';
        return view('dashboard', $data);
    }
}
