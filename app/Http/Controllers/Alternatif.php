<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Twilio\Rest\Client;



class Alternatif extends Controller
{
    public function index() : View {

        $alt = DB::table('alternatif')
        ->joinSub(function ($query) {
            $query->from('siswa')
                ->select('id', 'nama');
        }, 'siswa', function ($join) {
            $join->on('alternatif.siswa_id', '=', 'siswa.id');
        })
        ->join('kriteria as c1', 'alternatif.kriteria1_id', '=', 'c1.id')
        ->join('kriteria as c2', 'alternatif.kriteria2_id', '=', 'c2.id')
        ->join('kriteria as c3', 'alternatif.kriteria3_id', '=', 'c3.id')
        ->join('kriteria as c4', 'alternatif.kriteria4_id', '=', 'c4.id')
        ->selectRaw('alternatif.*, UPPER(siswa.nama) as nama_siswa, c1.nama as nama_kriteria1, c2.nama as nama_kriteria2, c3.nama as nama_kriteria3, c4.nama as nama_kriteria4')
        ->paginate(50);
    
    
        $result = DB::table('kriteria')
        ->select('kriteria.id AS id', 'kriteria.nama AS nama', 'kriteria.bobot AS bobot',
            DB::raw('kriteria.bobot / CAST((SELECT SUM(kriteria.bobot) FROM kriteria) AS DECIMAL(10,2)) AS nilai_w')
        )
        ->get();
        $nextId = $this->generateNextId();
        $siswadata = $this->gensiswa();
        $kriteria = $this->genkriteria();
        $ss = $this->getNewSiswaForAlternatif();

        // $kriteria = Criteria::getAllCriteria();
       
        // return view ('kriteria.halaman')->with('kriteria', $kriteria, $jumlah);
        return view('datanilai.nilai', compact('alt','result','nextId','siswadata','kriteria','ss'));
    }
    private function genkriteria()
    {
        return DB::table('kriteria')->get();
    }
    private function gensiswa()
    {
        return DB::table('siswa')->orderBy('id', 'desc')->first();
    }
    private function getNewSiswaForAlternatif() {
        $existingSiswaIds = DB::table('alternatif')->pluck('siswa_id')->toArray();
    
        return DB::table('siswa')
            ->whereNotIn('id', $existingSiswaIds)
            ->get();
    }
    public function getSiswaInfo($id)
{
    $s = DB::table('siswa')->find($id);
    return response()->json($s);
}

    
    
    private function generateNextId()
    {
        $lastAutoIncrement = DB::table('alternatif')->orderBy('id', 'desc')->select('id')->first();
        $nextAutoIncrement = $lastAutoIncrement ? ($lastAutoIncrement->id + 1) : 1;

        return '' . str_pad($nextAutoIncrement, 3, '0', STR_PAD_LEFT);
    }
    public function create(): View
    {
        $siswa = DB::table('siswa')->get();
        $kriteria = DB::table('kriteria')->get();
        $alt = DB::table('alternatif')->get();
        
        return view('datanilai.create', compact('siswa', 'kriteria','alt'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required|unique:alternatif',
            'siswa_id' => 'required|unique:alternatif',
            'kriteria1_id' => 'required',
            'kriteria2_id' => 'required',
            'kriteria3_id' => 'required',
            'kriteria4_id' => 'required',
            'nilai_kriteria1' => 'required',
            'nilai_kriteria2' => 'required',
            'nilai_kriteria3' => 'required',
            'nilai_kriteria4' => 'required',
        ]);
        $data = [
            'id' => $request->input('id'),
            'siswa_id' => $request->input('siswa_id'),
            'kriteria1_id' => $request->input('kriteria1_id'),
            'kriteria2_id' => $request->input('kriteria2_id'),
            'kriteria3_id' => $request->input('kriteria3_id'),
            'kriteria4_id' => $request->input('kriteria4_id'),
            'nilai_kriteria1' => $request->input('nilai_kriteria1'),
            'nilai_kriteria2' => $request->input('nilai_kriteria2'),
            'nilai_kriteria3' => $request->input('nilai_kriteria3'),
            'nilai_kriteria4' => $request->input('nilai_kriteria4'),
        ];

        DB::table('alternatif')->insert($data);
        return redirect('datanilai')->with('success', ' Data Alternatif Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $alt = DB::table('alternatif')->find($id);
        return view('datanilai.show')->with('alternatif', $alt);
    }
    public function edit(string $id): View
    {
        $alt = DB::table('alternatif')->find($id);
        $siswa = DB::table('siswa')->get();
        $kriteria = DB::table('kriteria')->get();

        return view('datanilai.edit', compact('alt', 'siswa', 'kriteria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
   
    public function update(Request $request, string $id): RedirectResponse
    {
        $alt = DB::table('alternatif')->find($id);
        DB::table('alternatif')->where('id', $id)->update([
            'id' => $request->input('id'),
            'siswa_id' => $request->input('siswa_id'),
        ]);
        
        $kriteria = DB::table('kriteria')->get();
        
        // Mengupdate nilai kriteria
        foreach ($kriteria as $index => $item) {
            $kriteria_id = $request->input('kriteria'.($index+1).'_id');
            $nilai_kriteria = $request->input('nilai_kriteria'.($index+1));
        
            DB::table('alternatif')->where('id', $id)->update([
                'kriteria'.($index+1).'_id' => $kriteria_id,
                'nilai_kriteria'.($index+1) => $nilai_kriteria,
            ]);
        }
        return redirect('datanilai')->with('success', 'Data Alternatif Updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        DB::table('alternatif')->where('id', $id)->delete();
        return redirect('datanilai')->with('success', 'Alternatif deleted!');
    }
    // public function calculateNilaiW()
    // {
       

    //         return view('datanilai.nilai', compact('result'));
    // }
    
}
