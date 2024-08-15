<?php

namespace Modules\Setting\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $userId = $this->route('user');
        return [
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'username' => [
                'required',
                Rule::unique('users', 'username')->ignore($userId),
            ],
            'roles_id' => 'required',
            'nohp_profile' => 'required',
            'jeniskelamin_profile' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email harus unik',
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username harus unik',
            'roles_id.required' => 'Roles wajib diisi',
            'nohp_profile.required' => 'No. handphone wajib diisi',
            'jeniskelamin_profile.required' => 'Jenis kelamin wajib diisi',
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
