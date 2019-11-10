<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KegiatanRequest;
use App\Model\Kegiatan;
use File;

class KegiatanController extends Controller
{
    public function __construct()
    {
        $this->title = "kegiatan";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $data = Kegiatan::orderBy('nama', 'ASC')->get();
        return view($title . '.index', compact('title', 'data'));
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
    public function store(KegiatanRequest $request)
    {
        $data = new Kegiatan();
        $data->nama = $request->get('nama');
        $data->tanggal = $request->get('tanggal');
        $data->jam_mulai = $request->get('jam_mulai');
        $data->jam_selesai = $request->get('jam_selesai');
        $data->tempat = $request->get('tempat');
        $data->nama_pengkhotbah = $request->get('nama_pengkhotbah');
        $data->gambar = $request->get('gambar');
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $file_extension = $file->getClientOriginalName();
            $destination_path = public_path() . '/gambar/kegiatan/';
            $filename = $file_extension;
            $request->file('gambar')->move($destination_path, $filename);
            $data->gambar = $filename;
        }
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
        $data = Kegiatan::find($id);
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
        $data = Kegiatan::find($model['id']);
        $data->fill($request->except('gambar'));
        if ($file = $request->hasFile('gambar')) {
            $fullPath = public_path("gambar/kegiatan/{$data->gambar}");
            if (File::exists($fullPath)) {
                File::delete($fullPath);
            }
            $file = $request->file('gambar');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/gambar/kegiatan/';
            $file->move($destinationPath, $fileName);
            $data->gambar = $fileName;
        }
        if ($data->save()) {
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
        if ($data = Kegiatan::find($id)) {
            $filename = $data->gambar;
            $fullPath = public_path("gambar/kegiatan/{$data->dokumen}");
            if (File::exists($fullPath)) {
                File::delete($fullPath);
            }
            $data->delete($fullPath);
            return redirect($this->title)->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect($this->title)->with('error', 'Terjadi Kesalahan');
        }
    }
}
