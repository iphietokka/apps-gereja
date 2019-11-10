<?php

namespace App\Http\Controllers;

use App\Http\Requests\GerejaRequest;
use Illuminate\Http\Request;
use App\Model\Klasis;
use App\Model\Gereja;

class GerejaController extends Controller
{
    public function __construct()
    {
        $this->title = "gereja";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $klasis = Klasis::pluck('nama', 'id');
        $gereja = Gereja::with('klasis')->orderBy('nama', 'ASC')->get();
        return view($title . '.index', compact('title', 'klasis', 'gereja'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GerejaRequest $request)
    {
        $data = new Gereja();
        $data->klasis_id = $request->get('klasis_id');
        $data->nama = $request->get('nama');
        $data->alamat = $request->get('alamat');
        $data->no_telp = $request->get('no_telp');
        $data->ketua = $request->get('ketua');
        $data->sekretaris = $request->get('sekretaris');
        $data->penghantar_jemaat = $request->get('penghantar_jemaat');
        if ($data->save()) {
            return redirect($this->title)->with('success', 'Data Berhasil Di Tambah');
        } else {
            return redirect()->back()->with('error', "Terjadi Kesalahan, Data Gagal Tersimpan");
        }
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
        $model = $request->all();
        $data = Gereja::find($model['id']);
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
        $data = Gereja::find($id);
        if ($data->delete()) {
            return redirect($this->title)->with('success', 'Data Berhasil Di Hapus');
        } else {
            return redirect()->back()->with('error', "Terjadi Kesalahan, Data Gagal Terhapus");
        }
    }
}
