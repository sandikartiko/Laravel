<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table ='siswa';
    protected $PrimaryKey ='id';
    protected $fillable = ['id','nama', 'jenis_kelamin', 'alamat','asal_sekolah'];
    use HasFactory;
}
