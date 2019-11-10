<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KeluargaRequest extends FormRequest
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
            'gereja_id' => 'required',
            'no_kk' => 'required|string',
            'sektor_id' => 'required|string',
            'nama_ayah' => 'required|string',
            'nama_ibu' => 'required|string',
            'tgl_nikah' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'gereja_id.required' => 'Gereja tidak boleh kosong',
            'no_kk.required' => 'Nama tidak boleh kosong',
            'sektor_id.required' => 'Sektor tidak boleh kosong',
            'nama_ayah.required' => 'Nama Ayah tidak boleh kosong',
            'nama_ibu.required' => 'Nama Ibu tidak boleh kosong',
            'tgl_nikah.required' => 'Tanggal Nikah tidak boleh kosong',
        ];
    }
}
