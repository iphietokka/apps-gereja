<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaptisRequest extends FormRequest
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
            'anggota_id' => 'required',
            'nama_saksi' => 'string',
            'nama_pendeta' => 'string',
            'tgl_baptis' => 'string',
            'tempat_baptis' => 'string',
        ];
    }

    public function messages()
    {
        return [
            'anggota_id.required' => 'Nama Tidak boleh kosong',
            'nama_saksi.required' => 'Nama Saksi tidak boleh kosong',
            'nama_pendeta.required' => 'Nama Pendeta tidak boleh kosong',
            'tgl_baptis.required' => 'Tanggal tidak boleh kosong',
            'tempat_baptis.required' => 'Tempat Tidak Boleh Kosong',
        ];
    }
}
