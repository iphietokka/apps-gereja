<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Wadah;


class WadahController extends Controller
{
    public function __construct()
    {
        $this->title = 'wadah';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $wadah = Wadah::orderBy('nama', 'ASC')->get();
        return view($title . '.index', compact('title', 'wadah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Wadah();
        $data->nama = $request->get('nama');
        $data->koordinator = $request->get('koordinator');
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
        $data = Wadah::find($model['id']);
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
        $data = Wadah::find($id);
        if ($data->delete()) {
            return redirect($this->title)->with('success', 'Data Berhasil Di Hapus');
        } else {
            return redirect()->back()->with('error', "Terjadi Kesalahan, Data Gagal Terhapus");
        }
    }
}
