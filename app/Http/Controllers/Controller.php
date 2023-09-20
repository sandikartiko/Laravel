<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    public function dash(){
        $jumlah = DB::table('kriteria')->count();
        $siswa = DB::table('siswa')->count();
        $hasil = DB::table('lullus')->where('status','lulus')->count();
        $tidak = DB::table('lullus')->where('status','tidak lulus')->count();


        return view('dash', compact('jumlah','siswa','hasil','tidak'));
    }
}

