<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $kriteria;

    public function __construct()
    {
        $this->kriteria = \App\Models\kri::pluck('nama')->toArray();
    }
    public function up()
    {
        Schema::create('alternatif_coba', function (Blueprint $table) {
            $table->id();
            $table->integer('siswa_id');
            $table->foreign('siswa_id')->references('id')->on('siswa');
            foreach ($this->kriteria as $kriteria) {
                $table->float('nilai_' . strtolower(str_replace(' ', '_', $kriteria)));
            }
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alternatif');
    }
};
