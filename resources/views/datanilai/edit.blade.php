@extends('naveditnilai')
@section('title', 'Data alt$alt')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<div class="card bg-dark text-white">
  <div class="card-header">Update Data</div>
  <div class="card-body">
  <form action="{{ url('datanilai/'.$alt->id) }}" method="post">
                {!! csrf_field() !!}
                @method('PUT')
                <label>Id Siswa</label><br>
                <input type="text" name="id" id="id" class="form-control-sm" value="{{ $alt->id }}"><br><br>
                <label>Nama Siswa</label><br>
                <select name="siswa_id" id="siswa_id" class="form-control-sm" required>
                    @foreach($siswa as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $alt->siswa_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                    @endforeach
                </select><br><br>
                @foreach($kriteria as $index => $item)
    <label>Pilih Kriteria</label><br>
    <select name="kriteria{{ $index + 1 }}_id" id="kriteria{{ $index + 1 }}_id" class="form-control-sm" required>
        <option value="{{ $item->id }}" @if($item->id == $alt->{'kriteria'.($index + 1).'_id'}) selected @endif>{{ $item->nama }}</option>
    </select><br><br>
    <label>Nilai Kriteria {{ $index + 1 }}</label><br>
    <input type="text" name="nilai_kriteria{{ $index + 1 }}" id="nilai_kriteria{{ $index + 1 }}" class="form-control-sm" value="{{ $alt->{'nilai_kriteria'.($index + 1)} }}" required><br><br>
@endforeach

                <input type="submit" value="Save" class="btn btn-success"><br> 

            </form>
   
  </div>
</div>
</div>
 
@endsection

