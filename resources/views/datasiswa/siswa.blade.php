@extends('layouts.navsiswa')
@section('title', 'Data Siswa')
@section('content')

              

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card bg-dark text-white">
  <div class="card-header">HALAMAN SISWA</div>
  <div class="card-body">
      
    @if (Auth::user()->role_id ==1)                
   
    <a href="#" class="btn btn-sm btn-primary" title="Add New Kriteria" data-bs-toggle="modal" data-bs-target="#ModalCreate">
    <i class="menu-icon tf-icons bx bxs-message-square-add bx-tada" aria-hidden="true"></i> Add New
</a>
    @endif
    
    <a href="{{ url('datasiswa/exportPDF') }}" class="btn btn-sm btn-success" style="margin-left: 1100px; margin-top: 5;" title="">
        <i class="menu-icon tf-icons bx bxs-file-pdf bx-tada" aria-hidden="true"></i> Cetak PDF
    </a>

    <br>
    <br>
    
    @if(session('success'))
        <div class="alert alert-primary alert-sm" role="alert">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   

    <table class="table table-dark table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col" colspan="1">Nama Siswa</th>
                <th scope="col"colspan="1">Alamat</th>
                <th scope="col"colspan="1">Asal Sekolah </th>
                <th scope="col "colspan="1">Nomor Hp</th>
                <th scope="col ">Jenis Kelamin</th>
                <th scope="col" colspan="3">Option</th>
            </tr>
        </thead>
        <tbody>
          @foreach($siswa as $row)
            <tr>
            <td>{{ $row->id}}</td>
                <td>{{ $row->nama_siswa}}</td>
                <td>{{ $row-> alamat}}</td>
                <td>{{ $row->asal_sekolah }}</td>
                <td>{{ $row->no_hp }}</td>
                <td>{{ $row->jenis_kelamin }}</td>
                
                <td> 
                    @if (Auth::user()->role_id !=1)
                        -
                    @else
                   
                    <a href="#" title="Edit Siswa"data-bs-toggle="modal" data-bs-target="#ModalEdit{{$row->id}}"><button
                            class="btn btn-primary btn-sm"><i class="bx bxs-message-alt-edit bx-burst"
                                aria-hidden="true"></i></button></a>
                                <br>
                                <br>
                    @endif
                    <form method="POST" action="{{ url('/datasiswa' . '/' . $row->id) }}" accept-charset="UTF-8"
                        style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        @if (Auth::user()->role_id == 1)
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Siswa"
                            onclick="return confirm('&quot;Apakah Anda Ingin Menghapus ?&quot;')"><i class="bx bx-trash bx-spin"
                                aria-hidden="true"></i></button>
                                @endif
                    </form>
                </td>
                @include('datasiswa.modal.edit')
            </tr>
          @endforeach
          @if ($siswa->isEmpty())
            <tr>
                <td colspan="6">Tidak ada data siswa yang anda cari.</td>
            </tr>
        @endif
        <script>
    const searchInput = document.getElementById('search-input');

    searchInput.addEventListener('input', function() {
        const keyword = searchInput.value.trim();

        if (keyword.length > 0) {
            const searchForm = document.getElementById('search-form');
            searchForm.action = "{{ url('datasiswa/search') }}";
            searchForm.submit();
        }
    });
</script>
        </tbody>

    </table>
  
    <br>
    <ul class="pagination justify-content-center">
        @if ($siswa->onFirstPage())
            <li class="page-item disabled"><span class="page-link">Previous</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $siswa->previousPageUrl() }}">Previous</a></li>
        @endif

        @foreach ($siswa->getUrlRange(1, $siswa->lastPage()) as $page => $url)
            @if ($page == $siswa->currentPage())
                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
        @endforeach

        @if ($siswa->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $siswa->nextPageUrl() }}">Next</a></li>
        @else
            <li class="page-item disabled"><span class="page-link">Next</span></li>
        @endif
    </ul>
  
   

</div>
    </div>
</div>



@include('datasiswa.modal.create')
@endsection






  