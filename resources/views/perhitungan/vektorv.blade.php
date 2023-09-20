@extends('layouts.navper')
@section('title', 'Data Perhitungan')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card bg-dark text-white" style="width: 100%">
  <div class="card-header">Melakukan Perhitungan Nilai Preferensi Relatif (Vektor V)</div>
  <div class="card-body" >
      
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
   
    <table class="table table-dark table-bordered">
        <thead>
            <tr>
                
                <th scope="col"> Nama Siswa</th>
                <th scope="col"> Nilai V ternormalisasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nilaiV as $row)
            <tr>

                <td>{{ $row->nama_siswa}}</td>
                <td>{{ $row->nilai_v }}</td>
               
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <h4 class="text-white">Jumlah Data: {{ $jumlahData }}</h4>
    <br>
    <div class="text-center">
    <a href="{{ url('perhitungan/hasil') }}" class="btn btn-sm btn-primary" title="Add New Kriteria">
        <i class="menu-icon tf-icons bx bxs-message-square-add bx-tada" aria-hidden="true"></i> Lihat Hasil Seleksi
    </a>
    </div>
           
    </div>
    </div>
</div>
@endsection