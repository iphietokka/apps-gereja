<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GerejaRequest extends FormRequest
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
            'klasis_id' => 'required',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'no_telp' => 'required|string',
            'ketua' => 'required|string',
            'sekretaris' => 'required|string',
            'penghantar_jemaat' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'klasis_id.required' => 'Klasis tidak boleh kosong',
            'nama.required' => 'Nama tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'no_telp.required' => 'Telepon tidak boleh kosong',
            'ketua.required' => 'Ketua tidak boleh kosong',
            'sekretaris.required' => 'Sekretaris tidak boleh kosong',
            'penghantar_jemaat.required' => 'Penghantar Jemaat tidak boleh kosong',
        ];
    }
}
