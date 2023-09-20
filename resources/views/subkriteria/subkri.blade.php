@extends('layouts.navsub')
@section('title', 'Data Subkriteria')
@section('content')

   

<div class="container-xxl flex-grow-1 container-p-y">

<div class="card bg-dark text-white">
<div class="card-header">Subkriteria</div>
<div class="card-body">
@if ($message = Session::get('subkriteria_message'))
				<div class="alert alert-dark">
					<strong>{{ $message }}</strong>
				</div>
				@endif

<a href="{{ url('/subkriteria/create') }}" class="btn btn-sm btn-primary" title="Add New Kriteria">
        <i class="menu-icon tf-icons bx bxs-message-square-add bx-tada" aria-hidden="true"></i> Add New
    </a> 
    <br>

<table class="table table-dark table-bordered">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">nilai raport</th>
            

            <th scope="col"> Nama Kriteria</th>
            <th scope="col">Akreditasi </th>
            <th scope="col ">Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sub as $row)
        <tr>
            <th>{{ $loop->iteration }}</th>
          
            <td>{{ $row->nama}}</td>
            <td>{{ $row->kriteria->namakriteria}}</td>
            <td>{{ $row->nilai }}</td>
            <td> <a href="{{ url('/subkriteria/' . $row->id) }}" title="View Student"><button
                        class="btn btn-info btn-sm"><i class="bx bx-show-alt bx-fade-right bx-rotate-180"
                            aria-hidden="true"></i> Edit</button></a> ||
                <!-- <a href="{{ url('/subkriteria/'  .$row->id . '/edit') }}" title="Edit Student"><button
                        class="btn btn-primary btn-sm"><i class="bx bxs-message-alt-edit bx-burst"
                            aria-hidden="true"></i> Edit</button></a> -->
                <form method="POST" action="{{ url('/subkriteria' . '/' . $row->id) }}" accept-charset="UTF-8"
                    style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    ||
                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Student"
                        onclick="return confirm('&quot;Apakah Anda Ingin Menghapus ?&quot;')"><i class="bx bx-trash bx-spin"
                            aria-hidden="true"></i> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
</div>
</div>
</div>


@endsection
