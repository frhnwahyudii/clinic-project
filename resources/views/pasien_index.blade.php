@extends('layouts.hopeui')
@section('isi')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                {{ $judul }}
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">
                                <form class="d-flex" role="search" method="get"
                                    action="{{ url('pasien/cari/data', []) }}">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                                        name="search">
                                    &nbsp
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Kode Pasien</td>
                                    <td>Nama Pasien</td>
                                    <td>Jenis Kelamin</td>
                                    <td>Status</td>
                                    <td>Alamat</td>
                                    <td>Created</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasien as $a)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $a->kode_pasien }}</td>
                                        <td>{{ $a->nama_pasien }}</td>
                                        <td>{{ $a->jenis_kelamin }}</td>
                                        <td>{{ $a->status }}</td>
                                        <td>{{ $a->alamat }}</td>
                                        <td>{{ $a->created_at }}</td>
                                        <td>
                                            <a href="{{ url('pasien/' . $a->id . '/edit', []) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ url('pasien/' . $a->id, []) }}" method="post"
                                                class="d-inline" onsubmit="return confirm('Apakah Dihapus?')">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $pasien->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
