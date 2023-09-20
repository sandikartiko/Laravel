<?php

namespace Database\Seeders;

use App\Models\siswa;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class siswaseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        siswa::truncate();
        Schema::enableForeignKeyConstraints();

        $data =[
            ['nama'=>'sandi'],
            ['nama'=>'arul'],
            ['jenis_kelamin'=>'lakilaki'],
            ['jenis_kelamin'=>'lakilaki'],
            ['alamat'=>'papua'],
            ['alamat'=>'papua'],
            ['asal_sekolah'=>'sd inpers'],
            ['asal_sekolah'=>'sd inpers'],
        ];
        foreach ($data as $value){
            siswa:: insert([
                'nama' => $value['nama'],
                'jenis_kelamin' => $value['jenis_kelamin'],
                'alamat' => $value['alamat'],
                'asal_sekolah' => $value['asal_sekolah'],
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]);
        }
    }
    
}
