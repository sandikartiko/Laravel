<?php

namespace App\Http\Controllers;

use App\Models\criteria;
use App\Models\subkriteria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{

   
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
      
        $kriteria = DB::table('kriteria')->get();

        // $kriteria = Criteria::getAllCriteria();
       
        // return view ('kriteria.halaman')->with('kriteria', $kriteria, $jumlah);
        return view('kriteria.halaman', compact('kriteria'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
      
        return view('kriteria.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
       
        $data = [
            'id' => $request->input('id'),
            'nama' => $request->input('nama'),
            'bobot' => $request->input('bobot'),
            'tipe' => $request->input('tipe'),
        ];

        DB::table('kriteria')->insert($data);
        return redirect('kriteria')->with('success', 'Kriteria Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $kriteria = DB::table('kriteria')->find($id);
        return view('kriteria.show')->with('kriteria', $kriteria);
    }
    public function edit(string $id): View
    {
        $kriteria = DB::table('kriteria')->find($id);
        return view('kriteria.edit')->with('kriteria', $kriteria);
    }

    /**
     * Show the form for editing the specified resource.
     */
   
    public function update(Request $request, string $id): RedirectResponse
    {
        $data = [
            'nama' => $request->input('nama'),
            'bobot' => $request->input('bobot'),
            'tipe' => $request->input('tipe'),
        ];

        DB::table('kriteria')->where('id', $id)->update($data);
        return redirect('kriteria')->with('success', 'Kriteria Updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        DB::table('kriteria')->where('id', $id)->delete();
        return redirect('kriteria')->with('success', 'Kriteria deleted!');
    }

   
       
       

        
    
}
