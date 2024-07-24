<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pasien'] = \App\Models\Pasien::paginate(5);
        $data['judul'] = 'Data-data Pasien';
        return view('pasien_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['list_jk'] = ['Perempuan', 'Laki-Laki'];

        $data['list_st'] = ['Menikah', 'Belum Menikah'];
        return view('pasien_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_pasien' => 'required|unique:dokters,kode_dokter',
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'alamat' => 'required'
        ]);

        $pasien = new \App\Models\Pasien();
        $pasien->kode_pasien = $request->kode_pasien;
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->status = $request->status;
        $pasien->alamat = $request->alamat;
        $pasien->save();

        return back()->with('pesan', 'Data sudah Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['pasien'] = \App\Models\Pasien::findOrFail($id);
        $data['list_jk'] = ['Perempuan', 'Laki-Laki'];
        $data['list_st'] = ['Menikah', 'Belum Menikah'];
        return view('pasien_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_pasien' => 'required|unique:pasiens,kode_pasien,' . $id,
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'alamat' => 'required'
        ]);

        $pasien = \App\Models\Pasien::findOrFail($id);
        $pasien->kode_pasien = $request->kode_pasien;
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->status = $request->status;
        $pasien->alamat = $request->alamat;
        $pasien->save();

        return redirect('/pasien')->with('pesan', 'Data sudah DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokter = \App\Models\Pasien::findOrFail($id);
        $dokter->delete();
        return back()->with('pesan', 'Data Sudah Dihapus');
    }

    public function cari(Request $request)
    {
        $cari = $request->get('search');
        $data['pasien'] = \App\Models\Pasien::where('nama_pasien', 'like', '%' . $cari . '%')
            ->orwhere('alamat', 'like', '%' . $cari . '%')
            ->orwhere('kode_pasien', 'like', '%' . $cari . '%')
            ->orwhere('status', 'like', '%' . $cari . '%')
            ->orwhere('jenis_kelamin', 'like', '%' . $cari . '%')->paginate(5);
        $data['judul']  = 'Data-data Pasien';
        return view('pasien_index', $data);
    }
    public function Laporan()
    {
        $data['pasien'] = \App\Models\Pasien::all();
        $data['judul']  = 'Laporan Data Pasien';
        return view('pasien_laporan', $data);
    }

    public function registrasi()
    {
        $data['list_jk'] = ['Pria', 'Wanita'];
        return view('registrasi_form', $data);
    }
}
