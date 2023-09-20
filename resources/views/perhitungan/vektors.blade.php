@extends('layouts.navper')
@section('title', 'Data Perhitungan')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card bg-dark text-white" style="width: 100%">
  <div class="card-header">Menentukan Nilai S Ternormalisasi Setiap Alternatif</div>
  <div class="card-body" >
      
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
   
    <table class="table table-dark table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col"> Nilai S Setiap Alternatif</th>
            </tr>
        </thead>
        <tbody>
        @foreach($alternatifResults as $alternatifResult)
            <tr>
                <td>{{ $alternatifResult->alternatif_id }}</td>
                <td>{{ $alternatifResult->nama_siswa }}</td>
                <td>{{ $alternatifResult->nilai_s }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>
    <br>
    <table class="table table-dark table-bordered">
        <thead>
            <tr>
                <th scope="col">Total Nilai S Setiap Alternatif</th>
               
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $totalNilaiS }}</td>
            </tr>
        </tbody>
       

    </table>
    <br>
    <nav>
    <ul class="pagination justify-content-center">
        @if ($alternatifResults->onFirstPage())
            <li class="page-item disabled"><span class="page-link">Previous</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $alternatifResults->previousPageUrl() }}">Previous</a></li>
        @endif

        @foreach ($alternatifResults->getUrlRange(1, $alternatifResults->lastPage()) as $page => $url)
            @if ($page == $alternatifResults->currentPage())
                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
        @endforeach

        @if ($alternatifResults->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $alternatifResults->nextPageUrl() }}">Next</a></li>
        @else
            <li class="page-item disabled"><span class="page-link">Next</span></li>
        @endif
    </ul>
</nav>
  
   

    </div>
    </div>
</div>
@endsection