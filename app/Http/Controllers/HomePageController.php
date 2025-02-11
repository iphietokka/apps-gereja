<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Gereja;
use App\Model\Berita;
use App\Model\Galery;
use App\Model\JadwalIbadah;
use App\Model\Kegiatan;
use App\Model\WartaJemaat;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gereja = Gereja::all();
        $berita = Berita::all();
        $gallery = Galery::all();
        $kegiatan = Kegiatan::all();
        $warta = WartaJemaat::all();
        $jadwal = JadwalIbadah::all();
        return view('index', compact('gereja', 'berita', 'gallery', 'kegiatan', 'warta', 'jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gereja = Gereja::all();
        $beritas = Berita::find($id);
        return view('details', compact('beritas', 'gereja'));
    }

    public function wartaDetails($id)
    {
        $gereja = Gereja::all();
        $wartas = WartaJemaat::find($id);
        return view('details-warta', compact('wartas', 'gereja'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
