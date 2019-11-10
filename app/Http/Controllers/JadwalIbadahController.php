<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\JadwalIbadah;

class JadwalIbadahController extends Controller
{
    public function __construct()
    {
        $this->title = "jadwal-ibadah";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $jadwal = JadwalIbadah::orderBy('created_at', 'DESC')->get();
        return view($title . '.index', compact('title', 'jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = $this->title;
        return view($title . '.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new JadwalIbadah();
        $data->nama_ibadah = $request->get('nama_ibadah');
        $data->tanggal = $request->get('tanggal');
        $data->jam_mulai = $request->get('jam_mulai');
        $data->jam_selesai = $request->get('jam_selesai');
        $data->tempat = $request->get('tempat');
        $data->nama_pengkhotbah = $request->get('nama_pengkhotbah');
        if ($data->save()) {
            return redirect($this->title)->with('success', 'Data Berhasil Disimpan');
        }
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
        $title = $this->title;
        $data = JadwalIbadah::find($id);
        return view($title . '.edit', compact('title', 'data'));
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
        $data = JadwalIbadah::find($model['id']);
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
        $data = JadwalIbadah::find($id);
        if ($data->delete()) {
            return redirect($this->title)->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect($this->title)->with('error', 'Terjadi Kesalahan');
        }
    }
}
