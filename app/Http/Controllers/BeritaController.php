<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Berita;
use App\Http\Requests\BeritaRequest;
use Auth;
use File;

class BeritaController extends Controller
{
    public function __construct()
    {
        $this->title = "berita";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $berita = Berita::orderBy('title', 'ASC')->get();
        return view($title . '.index', compact('title', 'berita'));
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
    public function store(BeritaRequest $request)
    {
        $data = new Berita();
        $data->title = $request->get('title');
        $data->isi_berita = $request->get('isi_berita');
        $data->user_id = Auth::user()->id;
        $data->gambar = $request->get('gambar');
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $file_extension = $file->getClientOriginalName();
            $destination_path = public_path() . '/gambar/berita/';
            $filename = $file_extension;
            $request->file('gambar')->move($destination_path, $filename);
            $data->gambar = $filename;
        }
        if ($data->save()) {
            return redirect($this->title)->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function show($id)
    {
        $title = $this->title;
        $beritas = Berita::find($id);
        return view('details', compact('title', 'beritas'));
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
        $data = Berita::find($id);
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
        $data = Berita::find($model['id']);
        $data->fill($request->except('gambar'));
        if ($file = $request->hasFile('gambar')) {
            $fullPath = public_path("gambar/berita/{$data->gambar}");
            if (File::exists($fullPath)) {
                File::delete($fullPath);
            }
            $file = $request->file('gambar');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/gambar/berita/';
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
        if ($data = Berita::find($id)) {
            $filename = $data->gambar;
            $fullPath = public_path("gambar/berita/{$data->dokumen}");
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
