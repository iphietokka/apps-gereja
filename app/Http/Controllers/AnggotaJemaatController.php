<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnggotaRequest;
use Illuminate\Http\Request;
use App\Model\Keluarga;
use App\Model\AnggotaJemaat;
use App\Model\Wadah;

class AnggotaJemaatController extends Controller
{
    public function __construct()
    {
        $this->title = "anggota-jemaat";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $anggota = AnggotaJemaat::with('keluarga')->orderBy('nama', 'ASC')->get();
        return view($title . '.index', compact('title', 'anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = $this->title;
        $keluarga = Keluarga::pluck('no_kk', 'id');
        $wadah = Wadah::pluck('nama', 'id');
        return view($title . '.create', compact('title', 'keluarga', 'wadah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnggotaRequest $request)
    {
        $data = new AnggotaJemaat();
        $data->keluarga_id = $request->get('keluarga_id');
        $data->nik = $request->get('nik');
        $data->nama = $request->get('nama');
        $data->gelar = $request->get('gelar');
        $data->tempat_lahir = $request->get('tempat_lahir');
        $data->status_keluarga = $request->get('status_keluarga');
        $data->tgl_lahir = $request->get('tgl_lahir');
        $data->jenis_kelamin = $request->get('jenis_kelamin');
        $data->alamat = $request->get('alamat');
        $data->jenis_pekerjaan = $request->get('jenis_pekerjaan');
        $data->status_baptis = $request->get('status_baptis');
        $data->no_surat_baptis = $request->get('no_surat_baptis');
        $data->tgl_baptis = $request->get('tgl_baptis');
        $data->status_sidi = $request->get('status_sidi');
        $data->no_surat_sidi = $request->get('no_surat_sidi');
        $data->tgl_sidi = $request->get('tgl_sidi');
        $data->wadah_id = $request->get('wadah_id');
        $data->status = $request->get('status');
        $data->status_nikah = $request->get('status_nikah');
        if ($data->save()) {
            return redirect($this->title)->with('success', 'Data Berhasil Di Tambah');
        } else {
            return redirect()->back()->with('error', "Terjadi Kesalahan, Data Gagal Tersimpan");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = $this->title;
        $data = AnggotaJemaat::find($id);
        $keluarga = Keluarga::pluck('no_kk', 'id');
        $wadah = Wadah::pluck('nama', 'id');
        return view($title . '.edit', compact('title', 'data', 'keluarga', 'wadah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $model = $request->all();
        $data = AnggotaJemaat::find($model['id']);
        if ($data->update($model)) {
            return redirect($this->title)->with('success', 'Data Berhasil Di Update');
        } else {
            return redirect()->back()->with('error', "Terjadi Kesalahan, Data Gagal Terupdate");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = AnggotaJemaat::find($id);
        if ($data->delete()) {
            return redirect($this->title)->with('success', 'Data Berhasil Di Hapus');
        } else {
            return redirect()->back()->with('error', "Terjadi Kesalahan, Data Gagal Terhapus");
        }
    }
}
