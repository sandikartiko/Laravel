<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class AlternatifComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('datanilai.nilai', function ($view) {
        $a = DB::table('alternatif')
        ->join('siswa', 'alternatif.siswa_id', '=', 'siswa.id')
        ->join('kriteria as c1', 'alternatif.kriteria1_id', '=', 'c1.id')
        ->join('kriteria as c2', 'alternatif.kriteria2_id', '=', 'c2.id')
        ->join('kriteria as c3', 'alternatif.kriteria3_id', '=', 'c3.id')
        ->join('kriteria as c4', 'alternatif.kriteria4_id', '=', 'c4.id')
        ->selectRaw('alternatif.*, siswa.nama as nama_siswa, c1.nama as nama_kriteria1, c2.nama as nama_kriteria2, c3.nama as nama_kriteria3, c4.nama as nama_kriteria4')
        ->paginate(50);

    $view->with('a', $a);
});
    }
}
