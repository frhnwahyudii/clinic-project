@extends('layouts.hopeui')
@section('isi')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">
                        Edit Data Dokter
                    </div>
                    <div class="card-body">

                        <form action="{{ url('dokter/' . $dokter->id, []) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label for="my-input">Kode Dokter</label>
                                <input id="my-input" class="form-control" type="text" name="kode_dokter"
                                    value="{{ $dokter->kode_dokter ?? old('kode_dokter') }}">
                                <span class="text-danger">{{ $errors->first('kode_dokter') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="my-input">Nama Dokter</label>
                                <input id="my-input" class="form-control" type="text" name="nama_dokter"
                                    value="{{ $dokter->nama_dokter ?? old('nama_dokter') }}">
                                <span class="text-danger">{{ $errors->first('nama_dokter') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="my-select">Spesialis</label>
                                <select id="my-select" class="form-control" name="spesialis">
                                    <option value="">Pilih Spesialis</option>
                                    @foreach ($list_sp as $a)
                                        <option value="{{ $a }}" @selected($a == $dokter->spesialis)>{{ $a }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('spesialis') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="my-input">Nomor Hp</label>
                                <input id="my-input" class="form-control" type="text" name="nomor_hp"
                                    value="{{ $dokter->nomor_hp ?? old('nomor_hp') }}">
                                <span class="text-danger">{{ $errors->first('nomor_hp') }}</span>
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
