<?php

namespace App\Http\Controllers;

use App\Model\Gereja;
use Illuminate\Http\Request;
use App\Model\Sektor;

class SektorController extends Controller
{
    public function __construct()
    {
        $this->title = "sektor";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $sektor = Sektor::orderBy('nama', 'ASC')->get();
        $gereja = Gereja::pluck('nama', 'id');
        return view('sektor.index', compact('title', 'sektor', 'gereja'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Sektor();
        $data->nama = $request->get('nama');
        $data->gereja_id = $request->get('gereja_id');
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
        $data = Sektor::find($model['id']);
        if ($data->update($model)) {
            return redirect($this->title)->with('success', 'Data Successfully Updated');
        } else {
            return redirect()->back()->with('error', 'Something Went Wrong!!');
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
        $data = Sektor::find($id);
        if ($data->delete()) {
            return redirect($this->title)->with('success', 'Data Berhasil Di Hapus');
        } else {
            return redirect()->back()->with('error', "Terjadi Kesalahan, Data Gagal Terhapus");
        }
    }
}
