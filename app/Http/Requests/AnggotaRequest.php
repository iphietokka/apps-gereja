<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnggotaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'keluarga_id' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required|string',
            'jenis_pekerjaan' => 'string',
            'status_baptis' => 'required|string',
            'no_surat_baptis' => 'required|string',
            'tgl_baptis' => 'required|string',
            'status_sidi' => 'required|string',
            'no_surat_sidi' => 'required|string',
            'tgl_sidi' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'keluarga_id.required' => 'Keluarga tidak boleh kosong',
            'nik.required' => 'NIK tidak boleh kosong',
            'nama.required' => 'Nama tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'status_keluarga.required' => 'Status Keluarga Tidak Boleh Kosong',
            'tempat_lahir.required' => 'Tempat Lahir tidak boleh kosong',
            'tgl_lahir.required' => 'Tanggal Lahir tidak boleh kosong',
            'status_baptis.required' => 'Status Baptis tidak boleh kosong',
            'no_surat_baptis.required' => 'Nomor Surat Baptis Jemaat tidak boleh kosong',
            'status_sidi.required' => 'Status Sidi tidak boleh kosong',
            'no_surat_sidi.required' => 'Nomor Surat Sidi Jemaat tidak boleh kosong',
        ];
    }
}
