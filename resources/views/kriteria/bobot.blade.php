@extends('layouts.navbar')
@section('title', ': Bobot')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
<div class="card bg-dark text-white" style="width: 45rem;">
  <div class="card-header">Perhitungan Perbaikan Bobot</div>
  <div class="card-body">

  <a href="{{ url('kriteria') }}" class="btn btn-sm btn-danger" title="Add New Kriteria">
        <i class="menu-icon tf-icons bx bx-arrow-back bx-fade-right" aria-hidden="true"></i> Kembali
    </a>
<br>
<br>

  <table class="table table-dark table-bordered">
    <thead>
        <tr>
            <th> ID Kriteria</th>   
            <th>Nilai W</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bobotWP as $krnamakriteria => $bobot)
        <tr>
        <td>{{ $krnamakriteria}}</td>
            <td>{{ $bobot }}</td>
        </tr>
        @endforeach
    </tbody>
    
</table>
<table class="table table-dark table-bordered">
    <thead>
        <tr>
            <th> ID Kriteria</th>   
            <th>nilai W ternormalisasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bobotWP as $krnamakriteria => $nilaiW)
        <tr>
        <td>{{ $krnamakriteria}}</td>
            <td>{{ $nilaiW }}</td>
        </tr>
        @endforeach
    </tbody>
    
</table>

<table class="table table-dark table-bordered">
    <thead>
        <tr>
            <th> Alternatif</th>   
            <th>Nilai s</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vektorS as $alternatifid_siswa => $nilaiS)
        <tr>
        <td>{{ $alternatifid_siswa}}</td>
            <td>{{ $nilaiS }}</td>
        </tr>
        @endforeach
    </tbody>
    
</table>


  </div>
</div>
</div>
@endsection
