@extends('layouts.navbarnilai')
@section('title', 'Data alternatif')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card bg-dark text-white" style="width: 100%">
  <div class="card-header">HALAMAN ALTERNATIF</div>
  <div class="card-body" >
      
    @if (Auth::user()->role_id ==1)                
    <a href="#" class="btn btn-sm btn-primary" title="Tambah Alternatif" data-bs-toggle="modal" data-bs-target="#ModalCreate">
    <i class="menu-icon tf-icons bx bxs-message-square-add bx-tada" aria-hidden="true"></i> Add New
</a>
    @endif
   

    <br>
    <br>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
   

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
                <th scope="col">Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alt as $row)
            <tr>
                <th>{{ $row->id }}</th>
                <td>{{ $row->nama_siswa }}</td>
                <td>{{ $row->nama_kriteria1}}</td>
                <td>{{ $row->nama_kriteria2 }}</td>
                <td>{{ $row->nama_kriteria3 }}</td>
                <td>{{ $row->nama_kriteria4 }}</td>
                <td>{{ $row->nilai_kriteria1 }}</td>
                <td>{{ $row->nilai_kriteria2 }}</td>
                <td>{{ $row->nilai_kriteria3 }}</td>
                <td>{{ $row->nilai_kriteria4 }}</td>
                
                <td> 
                    @if (Auth::user()->role_id !=1)
                        -
                    @else
                 
                    <a href="{{ url('/datanilai/'  .$row->id . '/edit') }}" title="Edit Alternatif"><button
                            class="btn btn-primary btn-sm"><i class="bx bxs-message-alt-edit bx-burst"
                                aria-hidden="true"></i></button></a> 
                                <br>
                                <br>
                    @endif
                    <form method="POST" action="{{ url('/datanilai' . '/' . $row->id) }}" accept-charset="UTF-8"
                        style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        @if (Auth::user()->role_id == 1)
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Alternatif"
                            onclick="return confirm('&quot;Apakah Anda Ingin Menghapus ?&quot;')"><i class="bx bx-trash bx-spin"
                                aria-hidden="true"></i></button>
                                @endif
                    </form>
                </td>
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


@include('datanilai.modal.create')
@endsection
