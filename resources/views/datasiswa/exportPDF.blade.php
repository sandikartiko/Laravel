<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* CSS khusus untuk tampilan PDF */
        @page {
            margin: 100px 5px;
        }

        header {
            position: fixed;
            top: -60px;
            left: 0px;
            right: 0px;
            height: 50px;
            text-align: center;
        }

        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 50px;
            text-align: center;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: top;
            border: 1px solid #dee2e6;
        }

        .table-header {
            font-weight: bold;
            background-color: #343a40;
            color: #fff;
        }
        .signature {
            margin-top: 40px;
            text-align: right;
        }
        .signature1 {
            margin-top: 40px;
            margin-left: 589px;
            text-align: right;
        }
        .signature3 {
            margin-top: 20px;
            margin-right: 50px;
            text-align: right;
        }

        /* CSS khusus untuk tampilan cetak */
        @media print {
            header {
                display: block;
            }
            header:not(:first) {
                display: none;
            }
            footer {
                display: table-footer-group;
            }
        }
    </style>
</head>
<body>
    <header>
        <img src="{{ asset('assets/img/favicon/logo.png') }}" alt="Logo" style="width: 100px; height: 100px;">
        <h3>DATA SISWA SMP NEGERI 1 SUMBERPUCUNG</h3>
    </header>
    <br>

    <footer>
        <p>SMP NEGERI 1 SUMBERPUCUNG</p>
    </footer>

    <table class="table table-bordered">
        <thead>
            <tr class="table-header">
                <th scope="col">No</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Alamat</th>
                <th scope="col">Asal Sekolah</th>
                <th scope="col">Nomor Hp</th>
                <th scope="col">Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($s as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td>{{ $row->asal_sekolah }}</td>
                    <td>{{ $row->no_hp }}</td>
                    <td>{{ $row->jenis_kelamin }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="signature">
        <p>SUMBERPUCUNG, {{ date('d F Y') }}</p>
    </div>
    <div class="signature3">
        <p>Kepala Sekolah</p>
    </div>
    <br>
    
    <div class="signature1">
        <p style="border-bottom: 1px solid black; width: 219px;">SUJOKO PURNOMO,S.Pd.M.Pd</p>
        <p style="margin-right: 15px; margin-top: 0px;">NIP:197105041998031005</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
