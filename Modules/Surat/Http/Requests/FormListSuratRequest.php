<?php

namespace Modules\Surat\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FormListSuratRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $listSurat = $this->route('listSurat');
        if ($listSurat) {
            return [
                'judul_fsurat' => [
                    'required',
                    Rule::unique('form_surat', 'judul_fsurat')->ignore($listSurat),
                ],
            ];
        } else {
            return [
                'judul_fsurat' => [
                    'required',
                ],
            ];
        }
    }

    public function messages()
    {
        $listSurat = $this->route('listSurat');
        if ($listSurat) {
            return [
                'judul_fsurat.required' => 'Judul surat wajib diisi',
                'judul_fsurat.unique' => 'Judul surat harus unik',
            ];
        } else {
            return [
                'judul_fsurat.required' => 'Judul surat wajib diisi',
            ];
        }
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
