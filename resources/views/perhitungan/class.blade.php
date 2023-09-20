@extends('layouts.navper')
@section('title', 'Data Perhitungan')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card bg-dark text-white" style="width: 100%">
        <div class="card-header">Hasil Seleksi Penerimaan Siswa Baru SMP NEGERI 1 SUMBERPUCUNG</div>
        <div class="card-body">
            <a href="{{ url('perhitungan/exportPDF') }}" class="btn btn-sm btn-success" title="">
                <i class="menu-icon tf-icons bx bxs-file-pdf bx-tada" aria-hidden="true"></i> Cetak PDF
            </a>
            <br>
            <br>

            @if(session('success'))
                <div>{{ session('success') }}</div>
            @endif

            @foreach($kelas as $index => $siswaKelas)
                @php
                    $kelasSiswa = 7 . chr(64 + $index);
                @endphp
              <br>
              <br>
                <div class="row">
                    <div class="col">
                        <table class="table table-dark table-bordered table-border-thick">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">NO</th>
                                    <th style="text-align: center;">Nama Siswa</th>
                                    <th style="text-align: center;">Status</th>
                                    <th style="text-align: center;">Kelas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $peringkat = 1;
                                @endphp
                                @foreach($siswaKelas as $siswa)
                                    @php
                                        $namaSiswa = $siswa->nama_siswa;
                                        $statusLulus = ($peringkat <= 160) ? "Lulus" : "Tidak Lulus";
                                    @endphp
                                    <tr>
                                        <td style="text-align: center;">{{ $peringkat }}</td>
                                        <td>{{ $namaSiswa }}</td>
                                        <td style="text-align: center;">{{ $statusLulus }}</td>
                                        <td style="text-align: center;">{{ $kelasSiswa  }}</td>
                                    </tr>
                                    @php
                                        $peringkat++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

@endsection
