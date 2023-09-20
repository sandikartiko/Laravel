<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Dompdf\Dompdf;
use Faker\Provider\Base;
use Vonage\Client;
use Vonage\Client\Credentials\Basic;
use PDF;
use Vonage\Laravel\Facade\Vonage;
use Vonage\SMS\Message\SMS;

class perhitungan extends Controller
{
    /**
     * Display a listing of the resource.
     */
       // Definisikan konstanta 'BRAND_NAME' di dalam controller

       public function sendsms()
       {
           $toNumber = '6281331819719';
           $fromNumber = '6282124389882';
           $text = new SMS($toNumber, $fromNumber, 'Test SMS using Laravel');
       
           $apiKey = '83a040a5';
           $apiSecret = 'duEjDMbD2nmYPFWA';
           $basic = new \Vonage\Client\Credentials\Basic($apiKey, $apiSecret);
           $client = new Client($basic);
       
           $client->sms()->send($text);
       }

    public function kriteria (){
        $result = DB::select("SELECT SUM(bobot) AS total_bobot FROM kriteria");

        $totalBobot = $result[0]->total_bobot;
        $kriteria = DB::table('kriteria')->get();

        // $kriteria = Criteria::getAllCriteria();
       
        // return view ('kriteria.halaman')->with('kriteria', $kriteria, $jumlah);
        return view('perhitungan.kriteria', compact('kriteria','totalBobot'));
    }
    public function errors (){
       
        return view('errors.503');
    }
    public function matriks(){
        $alt = DB::table('alternatif') ->join('siswa', 'alternatif.siswa_id', '=', 'siswa.id')
        ->join('kriteria as c1', 'alternatif.kriteria1_id', '=', 'c1.id')
        ->join('kriteria as c2', 'alternatif.kriteria2_id', '=', 'c2.id')
        ->join('kriteria as c3', 'alternatif.kriteria3_id', '=', 'c3.id')
        ->join('kriteria as c4', 'alternatif.kriteria4_id', '=', 'c4.id')
        ->select('alternatif.*', 'siswa.nama', 'c1.nama as nama_kriteria1', 'c2.nama as nama_kriteria2', 'c3.nama as nama_kriteria3', 'c4.nama as nama_kriteria4')
        ->paginate(50);
        return view('perhitungan.matriks', compact('alt'));
    }

    public function bobotternormalisasi(){
        $pangkat = DB::select("
SELECT
    nama,
    CASE
        WHEN tipe = 'benefit' THEN CAST(bobot AS decimal(10, 2)) / CAST((SELECT SUM(bobot) FROM kriteria) AS decimal(10, 2))
        WHEN tipe = 'cost' THEN -1 * (CAST(bobot AS decimal(10, 2)) / CAST((SELECT SUM(bobot) FROM kriteria) AS decimal(10, 2)))
    END AS nilai_pangkat
FROM
    kriteria
ORDER BY
    nilai_pangkat DESC
");
return view('perhitungan.bobotternormalisasi', compact('pangkat'));
    }
    public function vektors (){
        $alternatifResults = DB::table('skripsi.alternatif AS a')
        ->select('a.id AS alternatif_id', 's.nama AS nama_siswa', DB::raw("FORMAT(pow(a.nilai_kriteria1, w1.nilai_w) * pow(a.nilai_kriteria2, w2.nilai_w) * pow(a.nilai_kriteria3, w3.nilai_w) * pow(a.nilai_kriteria4, w4.nilai_w), 4) AS nilai_s"))
        ->join('skripsi.siswa AS s', 'a.siswa_id', '=', 's.id')
        ->join('skripsi.nilai_w AS w1', 'a.kriteria1_id', '=', 'w1.id')
        ->join('skripsi.nilai_w AS w2', 'a.kriteria2_id', '=', 'w2.id')
        ->join('skripsi.nilai_w AS w3', 'a.kriteria3_id', '=', 'w3.id')
        ->join('skripsi.nilai_w AS w4', 'a.kriteria4_id', '=', 'w4.id')
        ->paginate(50);
    
    
            $totalS = DB::table('skripsi.ppp')
            ->select(DB::raw('SUM(nilai_s) AS total_nilai_s'))
            ->first();
    
             $totalNilaiS = $totalS->total_nilai_s;
             return view('perhitungan.vektors', compact('alternatifResults','totalNilaiS'));
    }
    public function vektorv(){
        $nilaiV = DB::select("
        SELECT
            nilai_s.alternatif_id AS alternatif_id,
            nilai_s.nama_siswa AS nama_siswa,
            FORMAT(nilai_s.nilai_s / total_nilais.total_nilai_s, 9) AS nilai_v
        FROM
            skripsi.nilai_s
        JOIN
            skripsi.total_nilais
            ORDER BY nilai_v DESC
            
    ");
    usort($nilaiV, function($a, $b) {
       return $b->nilai_v <=> $a->nilai_v;
   });
   $jumlahData = count($nilaiV);
   return view('perhitungan.vektorv', compact('nilaiV','jumlahData'));

    }

    public function hasil()
    {
        $nilaiV = DB::select("
        SELECT
            nilai_s.alternatif_id AS alternatif_id,
            nilai_s.nama_siswa AS nama_siswa,
            nilai_s.nilai_s / total_nilais.total_nilai_s AS nilai_v
        FROM
            skripsi.nilai_s
        JOIN
            skripsi.total_nilais
            ORDER BY nilai_v DESC
            
    ");
    usort($nilaiV, function($a, $b) {
       return $b->nilai_v <=> $a->nilai_v;
   });
   return view('perhitungan.hasil', compact('nilaiV'));
    }

    public function exportPDF()
    {
         // Retrieve the data from the database or any other source
         $nilaiV = DB::select("
         SELECT
             nilai_s.alternatif_id AS alternatif_id,
             nilai_s.nama_siswa AS nama_siswa,
             nilai_s.nilai_s / total_nilais.total_nilai_s AS nilai_v
         FROM
             skripsi.nilai_s
         JOIN
             skripsi.total_nilais
         ORDER BY nilai_v DESC
         
     ");

     // Sort the data
     usort($nilaiV, function ($a, $b) {
         return $b->nilai_v <=> $a->nilai_v;
     });
           // Buat objek Dompdf
           
           $dompdf = new Dompdf();
           
        
           // Ambil konten dari view tabel alternatif yang ingin dijadikan PDF
           $content = view('perhitungan.exportPDF', compact('nilaiV'))->render();
   
           // Tambahkan konten ke Dompdf
           
           $dompdf->loadHtml($content);
   
           // Render PDF
           $dompdf->render();
   
           // Generate output PDF
           $dompdf->stream('hasil_.pdf', ['Attachment' => false]);
    
    }
    public function class()
            {
                $nilaiV = DB::select("
                    SELECT
                        nilai_s.alternatif_id AS alternatif_id,
                        nilai_s.nama_siswa AS nama_siswa,
                        nilai_s.nilai_s / total_nilais.total_nilai_s AS nilai_v
                    FROM
                        skripsi.nilai_s
                    JOIN
                        skripsi.total_nilais
                    ORDER BY nilai_v DESC
                    LIMIT 160
                ");
                
                $jumlahSiswaPerKelas = 32; // Jumlah siswa per kelas
                $jumlahSiswa = count($nilaiV); // Jumlah total siswa
                $jumlahKelas = ceil($jumlahSiswa / $jumlahSiswaPerKelas); // Jumlah kelas
        
                $kelas = [];
                for ($i = 1; $i <= $jumlahKelas; $i++) {
                    $kelas[$i] = [];
                }
        
                $peringkat = 1;
                foreach ($nilaiV as $siswa) {
                    $kelasSiswa = ceil($peringkat / $jumlahSiswaPerKelas);
                    $siswa->kelas = 'Kelas ' . $kelasSiswa;
                    $kelas[$kelasSiswa][] = $siswa;
                    $peringkat++;
                }
        
                return view('perhitungan.class', compact('kelas'));
            }

            public function call()
            {
                $nilaiV = DB::select("
    SELECT
        nilai_s.alternatif_id AS alternatif_id,
        nilai_s.nama_siswa AS nama_siswa,
        nilai_s.nilai_s / total_nilais.total_nilai_s AS nilai_v,
        siswa.no_hp AS no_hp
    FROM
        skripsi.nilai_s
    JOIN
        skripsi.total_nilais ON nilai_s.alternatif_id = total_nilais.alternatif_id
    JOIN
        skripsi.siswa ON nilai_s.alternatif_id = siswa.alternatif_id
    ORDER BY nilai_v DESC
");

usort($nilaiV, function($a, $b) {
    return $b->nilai_v <=> $a->nilai_v;
});

return view('perhitungan.call', compact('nilaiV'));

            }

            
        }
        
