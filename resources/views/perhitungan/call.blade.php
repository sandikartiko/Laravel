<!DOCTYPE html>
<html>
<head>
    <title>Hasil Perhitungan</title>
</head>
<body>
    <h1>Hasil Perhitungan</h1>

    <table>
        <tr>
            <th>Nama Siswa</th>
            <th>Nilai V</th>
            <th>No. HP</th>
        </tr>
        @foreach($nilaiV as $nilai)
            <tr>
                <td>{{ $nilai->nama_siswa }}</td>
                <td>{{ $nilai->nilai_v }}</td>
                <td>{{ $nilai->no_hp }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
