<?php

namespace App\Http\Controllers;
use App\Models\subkriteria;
use App\Models\criteria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class SubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //  $sub = subkriteria::all();
        $sub = subkriteria::all();
        return view('subkriteria.subkri', compact('sub'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $kriteria = criteria::all(); 
        return view('subkriteria.create', compact('kriteria'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $subkri = new subkriteria;
       $subkri->kriteria_id = $request->kriteria_id;
       $subkri->nama = $request->nama;
       $subkri->nilai = $request->nilai;
       $subkri->save();
        return redirect('subkriteria')->with('subkriteria_message', 'subkriteria Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $sub = subkriteria::find($id);
        $kriteria = criteria::all();
   
        return view('subkriteria.show', compact('kriteria', 'sub'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $sub = subkriteria::find($id);
        $input = $request->all();
        $sub->update($input);
        return redirect('subkriteria')->with('kriteria_message', 'Kriteria Updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        subkriteria::destroy($id);
        return redirect('subkriteria')->with('kriteria_message', 'Kriteria deleted!');
    }
}
