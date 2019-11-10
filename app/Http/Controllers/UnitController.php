<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Sektor;
use App\Model\Unit;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->title = "unit";
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
        $unit = Unit::orderBy('nama', 'ASC')->get();
        return view($title . '.index', compact('title', 'sektor', 'unit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Unit();
        $data->nama = $request->get('nama');
        $data->sektor_id = $request->get('sektor_id');
        $data->ketua_unit = $request->get('ketua_unit');
        if ($data->save()) {
            return redirect($this->title)->with('success', 'Data Unit Berhasil Di Tambah');
        } else {
            return redirect($this->title)->with('error', 'Terjadi Kesalahan, Data Gagal Di Tambah');
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
        $data = Unit::find($model['id']);
        if ($data->update($model)) {
            return redirect($this->title)->with('success', 'Data Berhasil Di Update');
        } else {
            return redirect($this->title)->with('error', 'Terjadi Kesalahan');
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
        $data = Unit::find($id);
        if ($data->delete()) {
            return redirect($this->title)->with('success', 'Data Berhasil Di Hapus');
        } else {
            return redirect($this->title)->with('error', 'Terjadi Kesalahan');
        }
    }
}
