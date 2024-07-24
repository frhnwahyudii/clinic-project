<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $judul }}</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <center>
                    <h2>{{ $judul }}</h2>
                </center>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kode Pasien</th>
                            <th>Nama Pasien</th>
                            <th>Kode Dokter</th>
                            <th>Nama Dokter</th>
                            <th>Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($administrasi as $a)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $a->tanggal->format('d M Y') }}</td>
                                <td>{{ $a->pasien->kode_pasien }}</td>
                                <td>{{ $a->pasien->nama_pasien }}</td>
                                <td>{{ $a->dokter->kode_dokter }}</td>
                                <td>{{ $a->dokter->nama_dokter }}</td>
                                <td>Rp. {{ number_format($a->biaya) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <br><br>
                <h5>Mengetahui</h5>
                <br>
                <br>
                <br>
                <h5>Admin</h5>

            </div>
        </div>
    </div>
</body>

</html>
