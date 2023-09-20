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
                <th scope="col">ID</th>
                <th scope="col">Nama Kriteria</th>
                <th scope="col"> Bobot</th>
                <th scope="col">Nilai W Ternormalisasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($result as $row)
            <tr>
                <th>{{ $row->id }}</th>
                <td>{{ $row->nama}}</td>
                <td>{{ $row->bobot}}</td>
                <td>{{ $row->nilai_w }}</td>
               
            </tr>
            @endforeach
        </tbody>
      
    </table>
    <br>
    <p>Total Seluruh Bobot: {{ $totalBobot }}</p>
    </div>
    </div>
</div>

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card bg-dark text-white" style="width: 100%">
  <div class="card-header">Menentukan Nilai Pangkat dengan...</div>
  <div class="card-body" >
    <table class="table table-dark table-bordered">
        <thead>
            <tr>
            <th>Kriteria</th>
            <th>Pangkat</th>
        </thead>
        <tbody>
        @foreach ($pangkat as $result)
        <tr>
            <td>{{ $result->nama }}</td>
            <td>{{ $result->nilai_pangkat }}</td>
        </tr>
        @endforeach
        </tbody>

    </table>
   
  
   

    </div>
    </div>
</div>

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

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card bg-dark text-white" style="width: 100%">
  <div class="card-header">Melakukan Perhitungan Menentukan Nilai Vektor V</div>
  <div class="card-body" >
      
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
   
    <table class="table table-dark table-bordered">
        <thead>
            <tr>
                <th scope="col">Nama Siswa</th>
                <th scope="col"> Nilai S / Total Nilai S</th>
            </tr>
        </thead>
        <tbody>
        @foreach($alternatifResults as $alternatifResult)
            <tr>
            <td>{{ $alternatifResult->nama_siswa }}</td>
            <td>{{ $alternatifResult->nilai_s }} / {{ $totalNilaiS }}</td>
            
               
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
</div>

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
<br>




@endsection
