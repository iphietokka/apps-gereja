<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KegiatanRequest extends FormRequest
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
            'nama' => 'required|string',
            'tanggal' => 'string',
            'jam_mulai' => 'string',
            'jam_selesai' => 'string',
            'gambar' => 'image|mimes:jpeg,png,jpg',
            'tempat' => 'string',
            'nama_pengkhotbah' => 'string'
        ];
    }
}
