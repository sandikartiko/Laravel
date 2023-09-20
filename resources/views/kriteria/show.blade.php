@extends('layouts.navbar')
@section('title', 'Data Kriteria')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<div class="card bg-dark text-white">
  <div class="card-header">Update Data</div>
  <div class="card-body">
  <div class="card-body">
        <h5 class="card-title">Name : {{ $kriteria->nama }}</h5>
        <p class="card-text">bobot : {{ $kriteria->bobot }}</p>
        <p class="card-text">tipe : {{ $kriteria->tipe }}</p>
  </div>
   
  </div>
</div>
</div>
 
@endsection

