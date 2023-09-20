@extends('layouts.navsiswa')
@section('title', 'Data Siswa')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<div class="card bg-dark text-white">
  <div class="card-header">Show Siswa</div>
  <div class="card-body">
  <div class="card-body">
        <h5 class="card-title">Nama Siswa : {{ $siswa->nama }}</h5>
        <p class="card-text">Alamat : {{ $siswa->alamat }}</p>
        <p class="card-text">Asal Sekolah : {{ $siswa->asal_sekolah }}</p>
        <p class="card-text">No Hp : {{ $siswa->no_hp }}</p>
        <p class="card-text">Jenis Kelamin : {{ $siswa->jenis_kelamin }}</p>
  </div>
   
  </div>
</div>
</div>
 
@endsection

