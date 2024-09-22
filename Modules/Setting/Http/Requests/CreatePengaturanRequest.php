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
            'email_pengaturan' => 'email',
            'video_pengaturan' => 'mimes:mp4,mov,ogg,qt|max:20000',
        ];
    }

    public function messages()
    {
        return [
            'namaaplikasi_pengaturan.required' => 'Nama Aplikasi wajib diisi',
            'namainstansi_pengaturan.required' => 'Nama Usaha wajib diisi',
            'notelepon_pengaturan.required' => 'No. Telepon wajib diisi',
            'email_pengaturan.email' => 'Email tidak valid',
            'video_pengaturan.mimes' => 'Format video harus berupa mp4, mov, ogg, atau qt',
            'video_pengaturan.max' => 'Ukuran video tidak boleh lebih dari 20MB',
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
