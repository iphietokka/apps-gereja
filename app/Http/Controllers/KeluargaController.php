<?php

namespace App\Http\Controllers;

use App\Http\Requests\KeluargaRequest;
use Illuminate\Http\Request;
use App\Model\Gereja;
use App\Model\Sektor;
use App\Model\Keluarga;
use App\Model\Unit;


class KeluargaController extends Controller
{
    public function __construct()
    {
        $this->title = "keluarga";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $sektor = Sektor::pluck('nama', 'id');
        $gereja = Gereja::pluck('nama', 'id');
        $unit = Unit::pluck('nama', 'id');
        $keluarga = Keluarga::with('sektor', 'gereja')->orderBy('no_kk', 'ASC')->get();
        return view($title . '.index', compact('title', 'sektor', 'gereja', 'keluarga', 'unit'));
    }

    public function create()
    {
        $title = $this->title;
        $sektor = Sektor::pluck('nama', 'id');
        $gereja = Gereja::pluck('nama', 'id');
        $unit = Unit::pluck('nama', 'id');
        return view($title . '.create', compact('title', 'sektor', 'gereja', 'unit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeluargaRequest $request)
    {
        $data = new Keluarga();
        $data->gereja_id = $request->get('gereja_id');
        $data->sektor_id = $request->get('sektor_id');
        $data->unit_id = $request->get('unit_id');
        $data->no_kk = $request->get('no_kk');
        $data->nama_ayah = $request->get('nama_ayah');
        $data->nama_ibu = $request->get('nama_ibu');
        $data->tgl_nikah = $request->get('tgl_nikah');
        if ($data->save()) {
            return redirect($this->title)->with('success', 'Data Berhasil Di Tambah');
        } else {
            return redirect()->back()->with('error', "Terjadi Kesalahan, Data Gagal Tersimpan");
        }
    }


    public function edit($id)
    {
        $title = $this->title;
        $data = Keluarga::find($id);
        $sektor = Sektor::pluck('nama', 'id');
        $gereja = Gereja::pluck('nama', 'id');
        $unit = Unit::pluck('nama', 'id');
        return view($title . '.edit', compact('title', 'sektor', 'gereja', 'unit', 'data'));
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
        $data = Keluarga::find($model['id']);
        if ($data->update($model)) {
            return redirect($this->title)->with('success', 'Data Berhasil Diupdate');
        } else {
            return redirect()->back()->with('error', 'Terjadi Kesalahan!!');
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
        $data = Keluarga::find($id);
        if ($data->delete()) {
            return redirect($this->title)->with('success', 'Data Berhasil Di Hapus');
        } else {
            return redirect()->back()->with('error', "Terjadi Kesalahan, Data Gagal Terhapus");
        }
    }

    public function ajaxRequest(Request $request)
    {
        $sektor_id = $request->get('categoryID');
        $sektors = Unit::where('sektor_id', $sektor_id)->get();
        return view('keluarga.unit', compact('sektors'));
    }
}
