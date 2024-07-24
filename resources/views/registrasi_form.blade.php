@extends('layouts.medilab')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">

                    <div class="card-body">
                        <form action="{{ url('pasien', []) }}" method="POST">
                            @method('POST')
                            @csrf

                            <div class="form-group">
                                <input id="my-input" class="form-control" type="text" name="kode_pasien"
                                    placeholder="No.KTP" value="{{ old('kode_pasien') }}">
                                <span class="text-danger">{{ $errors->first('kode_pasien') }}</span>
                            </div>
                            <br>
                            <div class="form-group">
                                <input id="my-input" class="form-control" type="text" name="nama_pasien"
                                    placeholder="Nama Pasien" value="{{ old('nama_pasien') }}">
                                <span class="text-danger">{{ $errors->first('nama_pasien') }}</span>
                            </div>
                            <br>
                            <div class="form-group">
                                <select id="my-select" class="form-control" name="jenis_kelamin">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    @foreach ($list_jk as $a)
                                        <option value="{{ $a }}" @selected($a == old('jenis_kelamin'))>{{ $a }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="my-select">Status</label>
                                <br>
                                &emsp;<input type="radio" name="status" id="" class="form-check-input"
                                    value="Belum Menikah"> Belum Menikah
                                <br>
                                &emsp;<input type="radio" name="status" id="" class="form-check-input"
                                    value="Sudah Menikah"> Sudah Menikah
                                <br>
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            </div>
                            <br>
                            <div class="form-group">
                                <textarea name="alamat" id="" cols="30" rows="3" class="form-control" placeholder="Alamat">{{ old('alamat') }}</textarea>
                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                            </div>
                    </div>
                    <div class="card-footer">
                        <center>
                            <button type="submit" class="btn btn-primary">Registrasi</button>
                        </center>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
