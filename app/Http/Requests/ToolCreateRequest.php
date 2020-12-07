<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToolCreateRequest extends FormRequest
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
            'title' => 'required',
            'link' => 'required',
            'description' => 'required',
            // 'tags' => 'required|array',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O valor titulo é obrigatório',
            'link.required' => 'O valor titulo é obrigatório',
            'description.required' => 'O valor titulo é obrigatório',
            // 'tags.required' => 'O valor titulo é obrigatório',
            // 'tags.array' => 'O valor tags é necessário que seja um array',
        ];
    }

}
