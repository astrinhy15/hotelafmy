<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Saya extends BaseController
{
    public function index()
    {
        //
    }
    public function astri($umur, $desa)
    {
        echo "nama saya astri umur saya {$umur} saya tinggal di {$desa}";
    }
}
