<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\AnggotaJemaat;
use App\Model\Gereja;
use App\Model\Keluarga;
use App\Model\Unit;
use App\Model\Wadah;


class LaporanController extends Controller
{
    public function __construct()
    {
        $this->title = "laporan";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        return view($title . '.index', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sidi(Request $request)
    {
        $sidi = AnggotaJemaat::where('status_sidi', 'Sudah')->get();
        $count = $sidi->count();
        $from = date('Y-m-d', strtotime($request->get('from')));
        $to = date('Y-m-d', strtotime($request->get('to')));

        return view('laporan.sidi', compact('sidi', 'count', 'from', 'to'));
        // ->withSidi($sidi->get())
        // ->withCount($sidi->count())
        // ->withFrom($request->get('from'))
        // ->withTo($request->get('to'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function baptis(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function umat(Request $request)
    {
        //
    }
}
