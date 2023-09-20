<?php

namespace App\Http\Controllers;

use App\Models\alt;
use App\Models\siswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $siswa = DB::table('siswa')
    ->selectRaw('*, UPPER(nama) as nama_siswa, UPPER(alamat) as alamat, UPPER(asal_sekolah) as asal_sekolah')
    ->paginate(20);

    
        $nextId = $this->generateNextId();

        return view('datasiswa.siswa', compact('siswa','nextId'));
    }
    private function generateNextId()
    {
        $lastAutoIncrement = DB::table('siswa')->orderBy('id', 'desc')->select('id')->first();
        $nextAutoIncrement = $lastAutoIncrement ? ($lastAutoIncrement->id + 1) : 1;

        return '' . str_pad($nextAutoIncrement, 3, '0', STR_PAD_LEFT);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('datasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required|unique:siswa',
            'nama' => 'required|unique:siswa',
            'alamat' => 'required',
            'asal_sekolah' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
        ]);
        $data = [
            'id' => $request->input('id'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'asal_sekolah' => $request->input('asal_sekolah'),
            'no_hp' => $request->input('no_hp'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
        ];
        
        DB::table('siswa')->insert($data);
        return redirect('datasiswa')->with('success', 'Siswa Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):View
    {
        $siswa = DB::table('siswa')->find($id);
        return view('datasiswa.show')->with('siswa', $siswa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):View
    {
        $siswa = DB::table('siswa')->find($id);
        return view('datasiswa.edit')->with('siswa', $siswa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $data = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'asal_sekolah' => $request->input('asal_sekolah'),
            'no_hp' => $request->input('no_hp'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
        ];


        DB::table('siswa')->where('id', $id)->update($data);
        return redirect('datasiswa')->with('success', 'Siswa Updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        DB::table('siswa')->where('id', $id)->delete();
        return redirect('datasiswa')->with('success', 'Siswa deleted!');
    }
    public function exportPDF()
    {
        // Ambil data alternatif dari database
        $s = DB::table('siswa')->get();
        $data =[
            'date'=>date('d/m/Y'),
            'siswa'=>$s
        ];

        // Buat objek Dompdf
        $dompdf = new Dompdf();

        // Ambil konten dari view tabel alternatif yang ingin dijadikan PDF
        $content = view('datasiswa.exportPDF', compact('s'))->render();

        // Tambahkan konten ke Dompdf
        $dompdf->loadHtml($content);

        // Render PDF
        $dompdf->render();

        // Generate output PDF
        $dompdf->stream('siswa_.pdf', ['Attachment' => false]);
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $siswa = DB::table('siswa')
        ->selectRaw('*, UPPER(nama) as nama_siswa')->where('nama', 'LIKE', "$keyword%")->paginate(20);
        
        // Dapatkan nilai $nextId sesuai dengan logic yang sesuai
        $latestSiswa = DB::table('siswa')->orderBy('id', 'desc')->first();
        $nextId = $latestSiswa ? $this->generateNextId($latestSiswa->id) : 'C001';
    
        return view('datasiswa.siswa', compact('siswa', 'nextId'));
    }
    
}
