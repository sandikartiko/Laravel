@extends('navedit')
@section('title', 'Data Kriteria')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<div class="card bg-dark text-white">
  <div class="card-header">Update Data</div>
  <div class="card-body">
      <form action="{{ url('/kriteria/' .$kriteria->id) }}"  method="post">
        {!! csrf_field() !!}
        @method("PUT")
        <input type="hidden" name="id" id="id" value="{{$kriteria->id}}" id="id">
        <label>Nama Kriteria</label></br>
        <input type="text" name="nama" id="nama" value="{{$kriteria->nama}}" class="form-control"></br>
        <label>Bobot</label></br>
        <input type="text" name="bobot" id="bobot" value="{{$kriteria->bobot}}" class="form-control"></br>
        <label>Benefit</label></br>
        <input type="textarea" name="tipe" id="tipe" value="{{$kriteria->tipe}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
</div>
 
@endsection

