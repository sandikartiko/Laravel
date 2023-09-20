<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alt extends Model
{
    protected $table = 'alternatifs';
    protected $fillable = [
        'IPA',
        
    ];
    
    // Tambahkan relasi dengan model Kriteria
    public function kriterias()
    {
        return $this->belongsToMany(kri::class)->withPivot('nilai');
    }
}
