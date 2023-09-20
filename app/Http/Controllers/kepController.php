<?php

namespace App\Http\Controllers;

use App\Models\criteria;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class kepController extends Controller
{
    public function index(): View
    {
        $Kriteria = criteria::getAllCriteria();
       

        
        return view('kepalasekolah.kriteria', compact('Kriteria'));
       

        
    }
}
