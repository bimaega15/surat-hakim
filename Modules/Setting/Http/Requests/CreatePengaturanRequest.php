<?php

namespace Modules\Setting\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePengaturanRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'namaaplikasi_pengaturan' => 'required',
            'namainstansi_pengaturan' => 'required',
            'notelepon_pengaturan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'namaaplikasi_pengaturan.required' => 'Nama Aplikasi wajib diisi',
            'namainstansi_pengaturan.required' => 'Nama Usaha wajib diisi',
            'notelepon_pengaturan.required' => 'No. Telepon wajib diisi',
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
