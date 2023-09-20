@extends('naveditsiswa')
@section('title', 'Data Siswa')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<div class="card bg-dark text-white">
  <div class="card-header">Update Data</div>
  <div class="card-body">
      <form action="{{ url('/datasiswa/' .$siswa->id) }}"  method="post">
        {!! csrf_field() !!}
        @method("PUT")
        <input type="hidden" name="id" id="id" value="{{$siswa->id}}" id="id">
        <label>Nama Siswa</label></br>
        <input type="text" name="nama" id="nama" value="{{$siswa->nama}}" class="form-control"></br>
        <label>Alamat</label></br>
        <input type="text" name="alamat" id="alamat" value="{{$siswa->alamat}}" class="form-control"></br>
        <label>Asal Sekolah</label></br>
        <input type="text" name="asal_sekolah" id="asal_sekolah" value="{{$siswa->asal_sekolah}}" class="form-control"></br>
        <label>Nomor Hp </label></br>
        <input type="text" name="no_hp" id="no_hp" value="{{$siswa->no_hp}}" class="form-control"></br>
        <label>Jenis_Kelamin</label></br>
        <input type="text" name="jenis_kelamin" id="jenis_kelamin" value="{{$siswa->jenis_kelamin}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
</div>
 
@endsection

