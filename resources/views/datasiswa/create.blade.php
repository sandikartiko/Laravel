@extends('layouts.navsiswa')
@section('title', ' Tambah Data Siswa')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
<div class="card bg-dark text-white" style="width: 45rem;">
  <div class="card-header">Siswa Page</div>
  <div class="card-body">
 
      <form action="{{ url('datasiswa') }}" method="post">
        {!! csrf_field() !!}
        <label>Id Siswa</label></br>
        <input type="text" name="id" id="id" class="form-control"></br>
        <label>Nama Siswa</label></br>
        <input type="text" name="nama" id="nama" class="form-control"></br>
        <label>Alamat</label></br>
        <input type="text" name="alamat" id="alamat" class="form-control"></br>
        <label>Asal Sekolah</label></br>
        <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control"></br>
        <label>Nomor Hp</label></br>
        <input type="text" name="no_hp" id="no_hp" class="form-control"></br>
        <label>Jenis Kelamin</label></br>
        <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control"></br>
      
        <input type="submit" value="Save" class="btn btn-success"></br> 
				
      
    </form>
    
  
  </div>
</div>
</div>
@endsection
