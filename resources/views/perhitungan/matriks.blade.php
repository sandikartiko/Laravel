@extends('layouts.navper')
@section('title', 'Data Perhitungan')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card bg-dark text-white" style="width: 100%">
  <div class="card-header">alternatif Page</div>
  <div class="card-body" >
    <table class="table table-dark table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col"> Kriteria 1</th>
                <th scope="col"> Kriteria 2</th>
                <th scope="col"> Kriteria 3</th>
                <th scope="col"> Kriteria 4</th>
                <th scope="col">Nilai Kriteria 1</th>
                <th scope="col">Nilai Kriteria 2</th>
                <th scope="col">Nilai Kriteria 3</th>
                <th scope="col">Nilai Kriteria 4</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alt as $row)
            <tr>
                <th>{{ $row->id }}</th>
                <td>{{ $row->nama}}</td>
                <td>{{ $row->nama_kriteria1}}</td>
                <td>{{ $row->nama_kriteria2 }}</td>
                <td>{{ $row->nama_kriteria3 }}</td>
                <td>{{ $row->nama_kriteria4 }}</td>
                <td>{{ $row->nilai_kriteria1 }}</td>
                <td>{{ $row->nilai_kriteria2 }}</td>
                <td>{{ $row->nilai_kriteria3 }}</td>
                <td>{{ $row->nilai_kriteria4 }}</td>
                
              
            </tr>
            @endforeach
        </tbody>

    </table>
    <br>
    <nav>
    <ul class="pagination justify-content-center">
        @if ($alt->onFirstPage())
            <li class="page-item disabled"><span class="page-link">Previous</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $alt->previousPageUrl() }}">Previous</a></li>
        @endif

        @foreach ($alt->getUrlRange(1, $alt->lastPage()) as $page => $url)
            @if ($page == $alt->currentPage())
                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
        @endforeach

        @if ($alt->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $alt->nextPageUrl() }}">Next</a></li>
        @else
            <li class="page-item disabled"><span class="page-link">Next</span></li>
        @endif
    </ul>
</nav>
  </div>
    </div>
</div>

@endsection