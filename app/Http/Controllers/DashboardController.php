<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Pegawai;
use App\Model\Gaji;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        $pegawai = Pegawai::all();
        $gaji = Gaji::all();
        return view('pages.index', [
            'pegawai' => count($pegawai),
            'gaji' => count($gaji)
        ]);
    }
}
