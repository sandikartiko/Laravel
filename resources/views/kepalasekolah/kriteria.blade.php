@extends('layouts.navbar')
@section('title', 'Data Kriteria')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card bg-dark text-white">
  <div class="card-header">Kriteria Page</div>
  <div class="card-body">
    <!-- <button type="button" class="btn btn-sm btn-dark" href="{{ url('create') }}">
  <i class=' menu-icon tf-icons bx bxs-message-square-add' ></i> Add New Data
  </button> -->
  @if ($message = Session::get('kriteria_message'))
				<div class="alert alert-dark">
					<strong>{{ $message }}</strong>
				</div>
				@endif
                
                
    <a href="{{ url('/kriteria/create') }}" class="btn btn-sm btn-primary" title="Add New Kriteria">
        <i class="menu-icon tf-icons bx bxs-message-square-add bx-tada" aria-hidden="true"></i> Add New
    </a> |||
    <a href="{{ url('bobot') }}" class="btn btn-sm btn-info" title="Add New Kriteria">
        <i class="menu-icon tf-icons bx bxs-calculator" aria-hidden="true"></i> View Bobot Nilai
    </a>

    <br>
    <br>
   

    <table class="table table-dark table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kriteria</th>
                <th scope="col">Bobot</th>
                <th scope="col">Keterangan </th>
            </tr>
        </thead>
        <tbody>
            @foreach($Kriteria as $row)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $row->namakriteria}}</td>
                <td>{{ $row-> bobot}}</td>
                <td>{{ $row->benefit }}</td>
                
               
            </tr>
            @endforeach
        </tbody>

    </table>
  
   

</div>
    </div>
</div>




@endsection
