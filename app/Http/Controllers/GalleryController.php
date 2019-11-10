<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use File;
use App\Model\Galery;

class GalleryController extends Controller
{
    function __construct()
    {
        $this->title = 'gallery';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $data = Galery::all();
        return view($title . '.index', compact('title', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Galery();
        $data->gambar = $request->get('gambar');
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $file_extension = $file->getClientOriginalName();
            $destination_path = public_path() . '/gambar/gallery/';
            $filename = $file_extension;
            $request->file('gambar')->move($destination_path, $filename);
            $data->gambar = $filename;
        }
        if ($data->save()) {
            return redirect($this->title)->with('success', 'Data Berhasil Disimpan');
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
        $data = Galery::find($model['id']);
        $data->fill($request->except('gambar'));
        if ($file = $request->hasFile('gambar')) {
            $fullPath = public_path("gambar/gallery/{$data->gambar}");
            if (File::exists($fullPath)) {
                File::delete($fullPath);
            }
            $file = $request->file('gambar');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/gambar/gallery/';
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
        if ($data = Galery::find($id)) {
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
