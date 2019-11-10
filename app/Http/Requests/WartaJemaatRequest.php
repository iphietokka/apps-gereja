<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WartaJemaatRequest extends FormRequest
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
            'title' => 'string|required',
            'isi_warta' => 'string|required',
            'gambar' => 'image|mimes:jpeg,png,jpg',
            'dokumen' => 'file|mimes:pdf,doc,docx',
        ];
    }
}
