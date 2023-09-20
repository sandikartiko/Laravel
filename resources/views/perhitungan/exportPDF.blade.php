<!DOCTYPE html>

<html
>
    
<head>
    <title>Data Hasil Seleksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{public_path ('assets/css/reportstyle.css')}}">
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

<!-- Core CSS -->
<link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="../assets/css/demo.css" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

<link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

<!-- Page CSS -->

<!-- Helpers -->
<script src="../assets/vendor/js/helpers.js"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="../assets/js/config.js"></script>
    <style>
        /* CSS khusus untuk tampilan PDF */
        @page {
            margin: 20px 25px;
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
            margin-left: 550px;
            text-align: right;
        }

        .signature3 {
            margin-top: 20px;
            margin-right: 50px;
            text-align: right;
        }
        .rangkasurat{
           margin: 0 auto;
            width: 780px;
            background-color: #fff;
            height: 180px;
        
        }
        .tab{
            border-bottom : 5px solid #000; 
            padding: 2px;
        }
        .tengah {
            text-align : center;
            line-height: 6px;
            
        }
    </style>
</head>
<body>
<div class = "rangkasurat">
     <table class="tab" width = "100%">
           <tr>
           <td> <img src="../perhitungan/logo.jpeg" width="95px" style="margin-left: 20px;"> </td>
                 
                 
                 <td class = "tengah">
                       <h2>PEMERINTAH KABUPATEN MALANG</h2>
                       <h2>DINAS PENDIDIKAN</h2>
                       <h2> SMP NEGERI 1 SUMBERPUCUNG</h2>
                       <p>Jalan Manggar 28 Telepon 0341-385409 SumberPucung 65165</p>
                       <p>e-mail : smpnegeri01sumberpucung@gmail.com</p>
                       
                 </td>
                 <td> <img src="/public/assets/img/favicon/favicon.ico" width="95px" style="margin-left: 20px;"> </td>
            </tr>
     </table >
</div>
    <br>

    <footer>
        <p>SMP NEGERI 1 SUMBERPUCUNG</p>
    </footer>

    <table class="table table-dark table-bordered">
        <thead>
            <tr>
                <th>Peringkat</th>
                <th>Nama Siswa</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php
            $peringkat = 1;
            @endphp
            @foreach ($nilaiV as $data)
                @php
                $alternatifID = $data->alternatif_id;
                $namaSiswa = $data->nama_siswa;
                $nilaiV = $data->nilai_v;
                $statusLulus = ($peringkat <= 160) ? "Lulus" : "Tidak Lulus";
                @endphp
                <tr>
                    <td style="text-align: center;">{{ $peringkat }}</td>
                    <td>{{ $namaSiswa }}</td>
                    <td style="text-align: center;">{{ $statusLulus }}</td>
                </tr>
                @php
                $peringkat++;
                @endphp
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
        <p style="margin-right: 15px;">NIP:197105041998031005</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
