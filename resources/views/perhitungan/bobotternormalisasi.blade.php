@extends('layouts.navper')
@section('title', 'Data Perhitungan')
@section('content')
<style>
#showCardBtn {
    margin-bottom: 10px;
  }

  #cardContainer {
    background-color:rgba(35, 52, 70, 1);
    border-radius: 10px;
    padding: 10px;
    margin-top: 20px;
    transition: background-color 0.3s ease;
  }

  #cardContent {
    text-align: left;
    color: white;
    font-size: 25px;
    font-family:'Times New Roman', Times, serif;
    
  }

  #closeCardBtn {
   
    color: red;
    border: none;
    padding: 5px 4px;
    border-radius: 3px;
    cursor: pointer;
    margin-top: 10px;
    margin-left: 1340px;
  }
</style>
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card bg-dark text-white" style="width: 100%">
  <div class="card-header">Menentukan Bobot Ternormalisasi</div>
  <div class="card-body" >

  <a id="showCardBtn" class="btn btn-sm btn-primary" title="Add New Kriteria">
        <i class="menu-icon tf-icons bx bxs-message-square-add bx-tada" aria-hidden="true"></i>Penjelasan Perhitungan
    </a>

    <table class="table table-dark table-bordered">
        <thead>
            <tr>
            <th>Kriteria</th>
            <th>Bobot Tenormalisasi</th>
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
     <!-- Card -->
     <div id="cardContainer" style="display: none;">
        <div id="cardContent">
        <a id="closeCardBtn"><i class="fas fa-times"></i></a>
            <p>Untuk melakukan perhitungan menentukan bobot ternormalisasi dari setiap kriteria yang di tentukan yaitu nilai bobot setiap kriteria di bagi dengan total jumlah nilai bobot sehingga akan menghasilkan nilai dari bobot ternormalisasi.</p>
        </div>
    </div>
</div>
</div>
<script>
    document.getElementById('showCardBtn').addEventListener('click', function() {
        document.getElementById('cardContainer').style.display = 'block';
    });

    document.getElementById('closeCardBtn').addEventListener('click', function() {
        document.getElementById('cardContainer').style.display = 'none';
    });
</script>
@endsection