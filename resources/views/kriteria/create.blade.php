@extends('layouts.navbar')
@section('title', ' Tambah Data Kriteria')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
<div class="card bg-dark text-white" style="width: 45rem;">
  <div class="card-header">Kriteria Page</div>
  <div class="card-body">
 
      <form action="{{ url('kriteria') }}" method="post">
        {!! csrf_field() !!}
        <label>Id Kriteria</label></br>
        <input type="text" name="id" id="id" class="form-control-sm"></br></br>
        <label>Nama Kriteria</label></br>
        <input type="text" name="nama" id="nama" class="form-control-sm"></br></br>
        <label>Bobot</label></br>
        <input type="text" name="bobot" id="bobot" class="form-control-sm"></br></br>
        <label>Benefit</label></br>
        <input type="text" name="tipe" id="tipe" class="form-control-sm"></br></br>
      
        <input type="submit" value="Save" class="btn btn-success"></br> 
				
      
    </form>
    
  
  </div>
</div>
</div>
@endsection
