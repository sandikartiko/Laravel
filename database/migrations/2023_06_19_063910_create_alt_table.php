<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alternatifs', function (Blueprint $table) {
            $table->id();
            $kriterias = \App\Models\kri::all();
            foreach ($kriterias as $kriteria) {
                $table->float($kriteria->nama)->default(0);
            }
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alt');
    }
};
