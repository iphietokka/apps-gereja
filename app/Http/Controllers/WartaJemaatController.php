<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\WartaJemaat;
use App\Http\Requests\WartaJemaatRequest;
use Auth;
use File;

class WartaJemaatController extends Controller
{
    public function __construct()
    {
        $this->title = "warta";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $warta = WartaJemaat::orderBy('title', 'ASC')->get();
        return view($title . '.index', compact('title', 'warta'));
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
    public function store(WartaJemaatRequest $request)
    {
        $data = new WartaJemaat();
        $data->title = $request->get('title');
        $data->isi_warta = $request->get('isi_warta');
        $data->user_id = Auth::user()->id;
        $data->dokumen = $request->get('dokumen');
        $data->gambar = $request->get('gambar');
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $file_extension = $file->getClientOriginalName();
            $destination_path = public_path() . '/gambar/warta/';
            $filename = $file_extension;
            $request->file('gambar')->move($destination_path, $filename);
            $data->gambar = $filename;
        }
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $file_extension = $file->getClientOriginalName();
            $destination_path = public_path() . '/dokumen/warta/';
            $filename = $file_extension;
            $request->file('dokumen')->move($destination_path, $filename);
            $data->dokumen = $filename;
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
        $data = WartaJemaat::find($id);
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
        $data = WartaJemaat::find($model['id']);
        $data->fill($request->except('gambar'));
        if ($file = $request->hasFile('gambar')) {
            $fullPath = public_path("gambar/warta/{$data->gambar}");
            if (File::exists($fullPath)) {
                File::delete($fullPath);
            }
            $file = $request->file('gambar');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/gambar/warta/';
            $file->move($destinationPath, $fileName);
            $data->gambar = $fileName;
        }
        $data->fill($request->except('dokumen'));
        if ($file = $request->hasFile('dokumen')) {
            $fullPath = public_path("dokumen/warta/{$data->dokumen}");
            if (File::exists($fullPath)) {
                File::delete($fullPath);
            }
            $file = $request->file('dokumen');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/dokumen/warta/';
            $file->move($destinationPath, $fileName);
            $data->dokumen = $fileName;
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
        if ($data = WartaJemaat::find($id)) {
            $filename = $data->gambar;
            $fullPath = public_path("gambar/warta/{$data->gambar}");
            if (File::exists($fullPath)) {
                File::delete($fullPath);
            }
            $filename = $data->dokumen;
            $fullPath = public_path("dokumen/warta/{$data->dokumen}");
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
