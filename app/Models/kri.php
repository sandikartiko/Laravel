<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kri extends Model
{
    protected $table = 'kriteriass';
    protected $fillable = [
        'nama',
        // tambahkan kolom lainnya yang perlu diisi
    ];

    // Definisikan relasi dengan model lain jika diperlukan
    public function alternatif()
    {
        return $this->hasMany(alt::class);
    }
    
    // Tambahkan method untuk mengambil nama kriteria
    public static function getKriteriaNames()
    {
        return self::pluck('nama')->toArray();
    }
}
