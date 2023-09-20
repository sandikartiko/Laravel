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

            <table class="table table-dark table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center;">Peringkat</th>
                        <th style="text-align: center;">Nama Siswa</th>
                        <th style="text-align: center;">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $peringkat = 1;
                    @endphp
                    @foreach ($nilaiV as $data)
                    @if ($peringkat <= 160)
                    <tr>
                        <td style="text-align: center;">{{ $peringkat }}</td>
                        <td >{{ $data->nama_siswa }}</td>
                        <td style="text-align: center;">Lulus</td>
                    </tr>
                    @endif
                    @php
                    $peringkat++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
<br>
<br>
            <table class="table table-dark table-bordered">
                <thead>
                    <tr>
                        <th>Peringkat</th>
                        <th>Nama Siswa</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $peringkat = 1; // Atur ulang nilai awal peringkat
                    @endphp
                    @foreach ($nilaiV as $data)
                    @if ($peringkat > 160)
                    <tr>
                        <td>{{ $peringkat }}</td>
                        <td>{{ $data->nama_siswa }}</td>
                        <td>Tidak Lulus</td>
                    </tr>
                    @endif
                    @php
                    $peringkat++;
                    @endphp
                    @endforeach
                </tbody>
            </table>

            <br>

            <div class="text-center">
                <a href="{{ url('perhitungan/class') }}" class="btn btn-sm btn-primary" title="Add New Kriteria">
                    <i class="menu-icon tf-icons bx bxs-message-square-add bx-tada" aria-hidden="true"></i> Lihat Pembagian Kelas
                </a>
            </div>
            <button id="kirimPesan" class="btn btn-sm btn-primary" title="Add New Kriteria">
    <i class="menu-icon tf-icons bx bxs-message-square-add bx-tada" aria-hidden="true"></i> KIRIM PESAN
</button>
            <!-- <div class="text-center">
                <a href="{{ url('perhitungan/call') }}" class="btn btn-sm btn-primary" title="Add New Kriteria">
                    <i class="menu-icon tf-icons bx bxs-message-square-add bx-tada" aria-hidden="true"></i> KIRIM PESAN
                </a>
            </div> -->
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var button = document.getElementById('kirimPesan');
        button.addEventListener('click', kirimSMS);
    });

    function kirimSMS() {
        // Membuat instance dari Vonage Client
        var basic = Vonage.Client.Credentials.Basic.fromString('YOUR_API_KEY', 'YOUR_API_SECRET');
        var client = new Vonage.Client(basic);

        // Mengirim SMS menggunakan Vonage (Nexmo)
        client.sms.send({
            to: '081331819719',
            from: '082124389882',
            text: 'KONTOL'
        }, function(err, responseData) {
            if (err) {
                console.log(err);
            } else {
                console.log(responseData);
            }
        });
    }
</script>


@endsection
