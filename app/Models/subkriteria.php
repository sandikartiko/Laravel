<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subkriteria extends Model
{
    protected $table ='subkriteria';
    protected $PrimaryKey ='id';
    protected $fillable = ['kriteria_id', 'nama','nilai'];
    use HasFactory;

    public function kriteria()
    {
        return $this -> belongsTo('App\Models\criteria');
    }
}
