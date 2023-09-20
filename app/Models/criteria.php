<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class criteria extends Model
{
   
    protected $table ='criteria';
    protected $PrimaryKey ='id';
    protected $fillable = ['id','namakriteria', 'bobot', 'tipe'];
    use HasFactory;


    // membuat fungsi menghitung nilai total bobot dari setiap kriteria
    public static function calculateTotalWeight()
    {
         return self::sum('bobot');
    }

    // mengambil data kriteria dari tabel kriteria
    public static function getAllCriteria()
{
    return self::all();
}
public static function getnilais()
{
     return self::sum('namakriteria');
}
}
