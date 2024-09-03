<?php

namespace Modules\Setting\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostMenuPermission extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_mpermissions' => 'required',
            'link_mpermissions' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_mpermissions.required' => 'Menu wajib diisi',
            'link_mpermissions.required' => 'Link wajib diisi',
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
