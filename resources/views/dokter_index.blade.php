@extends('layouts.hopeui')
@section('isi')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ $judul }}
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Kode Dokter</td>
                                    <td>Nama Dokter</td>
                                    <td>Spesialis</td>
                                    <td>Nomor Hp</td>
                                    <td>Created</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dokter as $a)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $a->kode_dokter }}</td>
                                        <td>{{ $a->nama_dokter }}</td>
                                        <td>{{ $a->spesialis }}</td>
                                        <td>{{ $a->nomor_hp }}</td>
                                        <td>{{ $a->created_at }}</td>
                                        <td>
                                            <a href="{{ url('dokter/' . $a->id . '/edit', []) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ url('dokter/' . $a->id, []) }}" method="post" class="d-inline"
                                                onsubmit="return confirm('Apakah Dihapus?')">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $dokter->links() }}
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
