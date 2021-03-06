<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagCreateRequest extends FormRequest
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
            'name' => 'required',
            'label' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O valor nome é obrigatório',
            'label.required' => 'O valor rótulo é obrigatório',
        ];
    }

}
