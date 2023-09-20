<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use App\Models\criteria;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BobotController extends Controller
{
    // public function hitung ()

    // {
    //     $kriteria = criteria::getAllCriteria();
    //     $totalWeight = criteria::calculateTotalWeight();
    //     $relativeWeights = [];
        
    //     foreach ($kriteria as $criterion) {
    //         $relativeWeight = $criterion->bobot / $totalWeight;
    //         $relativeWeights[$criterion->id] = $relativeWeight;
    //     }
    //     return view('kriteria.bobot', compact('totalWeight','relativeWeights'));
    // }
    public function hitungBobotWP()
    {
        $kriteria = criteria::getAllCriteria();
        $jumlahBobot = criteria::calculateTotalWeight();
        $alternatives = alternatif::all();
        $bobotWP = [];
        $vektorS = [];

        //menentukan nilai total bobot ternormalisasi dari setiap kriteria
        foreach ($kriteria as $kr) {
            $bobotWP[$kr->namakriteria] = $kr->bobot / $jumlahBobot;
        }

foreach ($alternatives as $alternatif) {
    $nilaiS = 1;
    foreach ($kriteria as $kr) {
        $nilaiKriteria = $alternatif->{$kr->IPA};
        $nilaiS *= pow($nilaiKriteria, $bobotWP[$kr->namakriteria]);
    }   
    $vektorS[$alternatif->id_siswa] = $nilaiS;
}
  
    return view('kriteria.bobot', compact('bobotWP',  'vektorS'));
   
}
}

