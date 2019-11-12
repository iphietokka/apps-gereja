<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\AnggotaJemaat;
use App\Model\PendaftaranBaptis;
use App\Http\Requests\BaptisRequest;

class PendaftaranBaptisController extends Controller
{
    public function __construct()
    {
        $this->title = "pendaftaran-baptis";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $baptis = PendaftaranBaptis::with('anggota')->orderBy('anggota_id', 'DESC')->get();
        return view($title . '.index', compact('title', 'baptis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = $this->title;
        $anggota = AnggotaJemaat::pluck('nama', 'id');
        return view($title . '.create', compact('title', 'anggota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BaptisRequest $request)
    {
        $data = new PendaftaranBaptis();
        $data->anggota_id = $request->get('anggota_id');
        $data->nama_saksi = $request->get('nama_saksi');
        $data->nama_pendeta = $request->get('nama_pendeta');
        $data->tgl_baptis = $request->get('tgl_baptis');
        $data->tempat_baptis = $request->get('tempat_baptis');
        if ($data->save()) {
            return redirect($this->title)->with('success', 'Data Berhasil di Tambah');
        } else {
            return redirect()->back()->with('error', 'Terjadi Kesalahan');
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
        $anggota = AnggotaJemaat::pluck('nama', 'id');
        $data = PendaftaranBaptis::find($id);
        return view($title . '.edit', compact('title', 'data', 'anggota'));
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
        $data = PendaftaranBaptis::find($model['id']);
        if ($data->update($model)) {
            return redirect($this->title)->with('success', 'Data Berhasil di Update');
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
        $data = PendaftaranBaptis::find($id);
        if ($data->delete()) {
            return redirect($this->title)->with('success', 'Data Berhasil di Hapus');
        } else {
            return redirect()->back()->with('error', 'Terjadi Kesalahan!!');
        }
    }
}
