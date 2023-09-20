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
        Schema::create('subkriteria', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kriteria_id')->unsigned();
            $table->string('nama', 100);
            $table->integer('nilai');
            
            $table->timestamps();
        });
        Schema::table('subkriteria', function (Blueprint $table) {
         
            $table->foreign('kriteria_id')->references('id')->on('criteria')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subkriteria');
    }
};
