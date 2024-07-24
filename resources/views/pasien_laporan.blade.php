<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Pasien</title>
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
                            <th>id</th>
                            <th>Kode Pasien</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Kelamin</th>
                            <th>Status</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasien as $a)
                            <tr>
                                <td>{{ $a->id }}</td>
                                <td>{{ $a->kode_pasien }}</td>
                                <td>{{ $a->nama_pasien }}</td>
                                <td>{{ $a->jenis_kelamin }}</td>
                                <td>{{ $a->status }}</td>
                                <td>{{ $a->alamat }}</td>
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
