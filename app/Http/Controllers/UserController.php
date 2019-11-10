<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->title = "user";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $users = User::orderBy('name', 'ASC')->get();
        return view('user.index', compact('title', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = new User();
        $data->name = $request->get('name');
        $data->username = $request->get('username');
        $data->active = $request->active;
        $data->password = bcrypt($request->password);
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
        $data = User::find($model['id']);
        if ($request->password == '') {
            $input = $request->except('password');
        } else {
            $input = $request->all();
        }
        if (!$request->password == '') {
            $input['password'] = bcrypt($request->password);
        }
        if ($data->update($input)) {
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
        $data = User::find($id);
        if ($data->delete()) {
            return redirect($this->title)->with('success', 'Data Berhasil Di Hapus');
        } else {
            return redirect()->back()->with('error', "Terjadi Kesalahan, Data Gagal Terhapus");
        }
    }
}
