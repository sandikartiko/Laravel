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
        Schema::create('alter', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_siswa')->unsigned();
            $table->string('C1', 100);
            $table->string('C2', 100);
            $table->timestamps();
        });
        Schema::table('alter', function (Blueprint $table) {
         
            $table->foreign('id_siswa')->references('id')->on('siswa')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alter');
    }
};
