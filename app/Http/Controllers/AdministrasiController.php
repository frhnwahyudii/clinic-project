<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['administrasi'] = \App\Models\Administrasi::paginate(5);
        $data['judul']  = 'Data-data Administrasi';
        return view('administrasi_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['list_pasien'] =
            \App\Models\Pasien::selectRaw("id,concat(kode_pasien,'-',nama_pasien) as tampil")
            ->pluck('tampil', 'id');

        $data['list_dokter'] =
            \App\Models\Dokter::selectRaw("id,concat(kode_dokter,'-',nama_dokter) as tampil")
            ->pluck('tampil', 'id');

        return view('administrasi_create', $data);
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
            'tanggal' => 'required',
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'biaya' => 'required'
        ]);

        $administrasi = new \App\Models\Administrasi();
        $administrasi->tanggal = $request->tanggal;
        $administrasi->pasien_id = $request->pasien_id;
        $administrasi->dokter_id = $request->dokter_id;
        $administrasi->biaya = $request->biaya;
        $administrasi->save();

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
        $data['administrasi'] = \App\Models\Administrasi::findOrFail($id);

        $data['list_pasien'] =
            \App\Models\Pasien::selectRaw("id,concat(kode_pasien,'-',nama_pasien) as tampil")
            ->pluck('tampil', 'id');

        $data['list_dokter'] =
            \App\Models\Dokter::selectRaw("id,concat(kode_dokter,'-',nama_dokter) as tampil")
            ->pluck('tampil', 'id');

        return view('administrasi_edit', $data);
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
            'tanggal' => 'required',
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'biaya' => 'required'
        ]);

        $administrasi = \App\Models\Administrasi::findOrFail($id);
        $administrasi->tanggal = $request->tanggal;
        $administrasi->pasien_id = $request->pasien_id;
        $administrasi->dokter_id = $request->dokter_id;
        $administrasi->biaya = $request->biaya;
        $administrasi->save();
        return redirect('/administrasi')->with('pesan', 'Data sudah DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $administrasi = \App\Models\Administrasi::findOrFail($id);
        $administrasi->delete();
        return back()->with('pesan', 'Data Sudah Dihapus');
    }

    public function Laporan()
    {
        $data['administrasi'] = \App\Models\Administrasi::all();
        $data['judul']  = 'Laporan Data Administrasi';
        return view('administrasi_laporan', $data);
    }
}
