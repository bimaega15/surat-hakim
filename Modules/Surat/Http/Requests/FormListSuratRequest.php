<?php

namespace Modules\Surat\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormListSuratRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'judul_fsurat' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'judul_fsurat.required' => 'Judul surat wajib diisi',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
