<?php

namespace App\Http\Requests\Facts;

use Illuminate\Foundation\Http\FormRequest;

class AddFromValidation extends FormRequest
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
                'title' => 'required ',
                'image' => 'required | mimes:jpeg,bmp,png,PNG,JPEG'
        ];
    }
}
