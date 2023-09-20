@extends('layouts.navper')
@section('title', 'Data Perhitungan')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card bg-dark text-white" style="width: 100%">
  <div class="card-header">Menentukan Nilai W Ternormalisasi Setiap Kriteria</div>
  <div class="card-body" >
      
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
   
    <table class="table table-dark table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kriteria</th>
                <th scope="col">Bobot</th>
                <th scope="col">Tipe </th>
               
            </tr>
        </thead>
        <tbody>
            @foreach($kriteria as $row)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $row->nama}}</td>
                <td>{{ $row-> bobot}}</td>
                <td>{{ $row->tipe }}</td>
                
               
            </tr>
            @endforeach
        </tbody>

    </table>
    <br>
    <p>Total Seluruh Bobot: {{ $totalBobot }}</p>
    </div>
    </div>
</div>
@endsection