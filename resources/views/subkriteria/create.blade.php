@extends('layouts.navsub')
@section('title', ' Tambah Data Subkriteria')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
<div class="card bg-dark text-white" style="width: 45rem;">
  <div class="card-header">Subkriteria Page</div>
  <div class="card-body">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <form action="{{ url('subkriteria') }}" method="post">
        {!! csrf_field() !!}
        <label>nama</label></br>
        <input type="text" name="nama" id="nama" class="form-control-sm"></br></br>
        <div class=" form-group">
        <label>Id Kriteria</label>
        <select name="kriteria_id" id="kriteria_id" class="form-contorl">
            <option value="">-pilih-</option>
            @foreach ($kriteria as $item)
            <option value="{{ $item->id }}">{{ $item->namakriteria }}</option>
            @endforeach
        </select></br>
        <label>nilai</label></br>
        <input type="text" name="nilai" id="nilai" class="form-control-sm"></br></br>
      
        <input type="submit" value="Save" class="btn btn-success"></br> 
				
      
    </form>
    
  
  </div>
</div>
</div>
@endsection
