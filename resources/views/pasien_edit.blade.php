@extends('layouts.hopeui')
@section('isi')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">
                        Edit Data Pasien
                    </div>
                    <div class="card-body">

                        <form action="{{ url('pasien/' . $pasien->id, []) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label for="my-input">Kode Pasien</label>
                                <input id="my-input" class="form-control" type="text" name="kode_pasien"
                                    value="{{ $pasien->kode_pasien ?? old('kode_pasien') }}">
                                <span class="text-danger">{{ $errors->first('kode_pasien') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="my-input">Nama Pasien</label>
                                <input id="my-input" class="form-control" type="text" name="nama_pasien"
                                    value="{{ $pasien->nama_pasien ?? old('nama_pasien') }}">
                                <span class="text-danger">{{ $errors->first('nama_pasien') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="my-select">Jenis Kelamin</label>
                                <select id="my-select" class="form-control" name="jenis_kelamin">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    @foreach ($list_jk as $a)
                                        <option value="{{ $a }}" @selected($a == $pasien->jenis_kelamin)>{{ $a }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="my-select">Status</label>
                                <select id="my-select" class="form-control" name="status">
                                    <option value="">Pilih Status</option>
                                    @foreach ($list_st as $a)
                                        <option value="{{ $a }}" @selected($a == $pasien->status)>{{ $a }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="my-input">Alamat</label>
                                <input id="my-input" class="form-control" type="text" name="alamat"
                                    value="{{ $pasien->alamat ?? old('alamat') }}">
                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                            </div>


                    </div>
                    <div class="card-footer">

                        <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
